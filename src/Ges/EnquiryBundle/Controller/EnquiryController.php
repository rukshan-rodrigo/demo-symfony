<?php

namespace Ges\EnquiryBundle\Controller;

use Ges\EnquiryBundle\Form\EnquirySearchType;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ges\EnquiryBundle\Entity\Enquiry;
use Ges\EnquiryBundle\Form\EnquiryType;
use Ges\EnquiryBundle\Form\EnquiryNotify;
use Ges\EnquiryBundle\Entity\Department;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateValidator;

/**
 * Enquiry controller.
 *
 * @Route("/enquiry")
 */
class EnquiryController extends Controller
{
    /**
     * Lists all Enquiry entities.
     *
     * @Route("/", name="enquiry")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('GesEnquiryBundle:Enquiry')->findAllData();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            50/*limit per page*/
        );

        // parameters to template
        return $this->render('GesEnquiryBundle:Enquiry:index.html.twig', array('entities' => $pagination));
    }

    /**
     * Creates a new Enquiry entity.
     *
     * @Route("/", name="enquiry_create")
     * @Method("POST")
     * @Template("GesEnquiryBundle:Enquiry:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {

            //get logged in user object and set enquiry user id
            $user = $this->get('security.context')->getToken()->getUser();
            $entity->setUserId($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enquiry_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Enquiry entity.
     *
     * @Route("/new", name="enquiry_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }


    /**
     * Display Search form
     *
     * @Route("/search", name="enquiry_search")
     * @Method({"GET", "POST"})
     * @Template("GesEnquiryBundle:Enquiry:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $results=array();
        $form = $this->createForm(new EnquirySearchType(new EnquirySearchType()));
        $requestSearch=false;
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($request);
            $results = array();
            if ($form->isValid()) {
                $postData = $form->getData();
                $enquiryRepository = $this->getDoctrine()->getRepository('GesEnquiryBundle:Enquiry');
                $results = $enquiryRepository->findEnquiries($postData);
                $requestSearch=true;
            }
        }

        return array(
            'entities' => $results,
            'search' => $requestSearch,
            'form' => $form->createView(),
        );
    }


    /**
     * Allows the administrator to download a CSV file of the enquiries
     *
     * @Route("/download", name="enquiry_download")
     * @Method({"GET", "POST"});
     * @Template("GesEnquiryBundle:Enquiry:download.html.twig")
     */
    public function downloadAction(Request $request)
    {

        $results=array();
        $errorMsg='';

        //We'll get the earliest year in which an enquiry has been reported. That year will be the minimum year selectable
        $enquiryRepository = $this->getDoctrine()->getRepository('GesEnquiryBundle:Enquiry');
        $this->getDoctrine()->getConnection();
        $minyear=$enquiryRepository->findFirstEnquiryYear();

        //Create the form
        $form = $this->createFormBuilder()->
            add('date_from', 'date', array(
                'years' => range($minyear->format('Y'),date('Y')),
                'constraints' => new Date()
            ))->
            add('date_to', 'date', array(
                'years' => range($minyear->format('Y'),date('Y')),
                'constraints' => new Date()
            ))->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $this->get('database_connectopm');
                $postdata = $form->getData();
                $ta='i'; //tablealias.
                $results = $enquiryRepository->findEnquiriesByDates($postdata,$ta);

                //Create a date summary header
                $csvdata=sprintf(",,,,,\" Enquiry report from %s to %s\"\n\n",$postdata['date_from']->format('jS \o\f F, Y'),$postdata['date_to']->format('jS \o\f F, Y'));

                if(count($results)>0){
                    reset($results);

                    //Create a column names header
                    $csvdata.=implode(',',array_map(function($k) use($ta){
                        $k = str_replace($ta.'_','',$k);
                        $k = str_replace('_',' ',$k);
                        return $k;
                    },array_keys(current($results))))."\n\n";

                    //Create the csv data
                    foreach ($results as $newenquiry) {
                        //Remove the DateTime objects because we need to implode the array into the csv file
                        $newenquiry[$ta.'_enquiry_date']=$newenquiry[$ta.'_enquiry_date']->format('Y-m-d H:i:s');
                        $newenquiry[$ta.'_created_at']=$newenquiry[$ta.'_created_at']->format('Y-m-d H:i:s');
                        $newenquiry[$ta.'_modified_at']=$newenquiry[$ta.'_modified_at']->format('Y-m-d H:i:s');

                        //Escape any double quotations since we will be appending our own double quotations to escape the comma
                        //Remove CRLF values since these can screw up how the data is shown in excel
                        array_walk($newenquiry,function(&$v, $k){
                            $v = str_replace('"','\"',$v);
                            $v = str_replace("\r\n"," ",$v);
                            $v = '"'.$v.'"';
                        });

                        $csvdata.=implode(',',$newenquiry)."\n";
                    }

                    $response = new Response();
                    $response->setContent($csvdata);
                    $response->headers->set('Content-Type', 'text/csv');
                    $response->headers->set('Content-Length', strlen($csvdata));
                    $response->headers->set('Content-Disposition', 'attachment; filename="report.csv"');

                    return $response;
                }
                else {
                    $errorMsg = 'There are no records that fall within the given dates';
                }
            }
        }

        return array(
            'form' => $form->createView(),
            'errormsg' => $errorMsg
        );
    }


    /**
     * Finds and displays a Enquiry entity.
     *
     * @Route("/{id}", name="enquiry_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:Enquiry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enquiry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Enquiry entity.
     *
     * @Route("/{id}/edit", name="enquiry_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:Enquiry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enquiry entity.');
        }

        $editForm = $this->createForm(new EnquiryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Enquiry entity.
     *
     * @Route("/{id}", name="enquiry_update")
     * @Method("PUT")
     * @Template("GesEnquiryBundle:Enquiry:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:Enquiry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enquiry entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EnquiryType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enquiry_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Enquiry entity.
     *
     * @Route("/{id}", name="enquiry_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GesEnquiryBundle:Enquiry')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Enquiry entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enquiry'));
    }

    /**
     * Creates a form to delete a Enquiry entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm();
    }

    /**
     * Displays a form to Notify. [wap]
     *
     * @Route("/{id}/notify", name="enquiry_notify")
     * @Method("GET")
     * @Template()
     */
    public function notifyAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('GesEnquiryBundle:Enquiry')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enquiry entity.');
        }

        $notifyForm = $this->createForm(new EnquiryNotify());
        return array(
            'entity' => $entity,
            'notify_form' => $notifyForm->createView(),
        );
    }



    /**
     * send Email Notification. [wap]
     *
     * @Route("/{id}/sendnotify", name="enquiry_sendnotify")
     * @Template()
     */
    public function sendnotifyAction($id)
    {
        $notify_subject ="";
        $notify_from =  $this->container->getParameter('from_email');
        $notify_to ="";
        $notify_body ="";

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('GesEnquiryBundle:Enquiry')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Enquiry entity.');
        }

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {

            $postData = $request->request->all();
            $notify_text = $postData['notify_text'];
            $notify_department = $postData['department'];
            $notify_email = $postData['notify_email'];
            $notify_to = $postData['notify_to'];


            if ($notify_to == 0) {
                //set mail to department
                $entity_department = $em->getRepository('GesEnquiryBundle:Department')->find($notify_department);
                if (!$entity_department) {
                    throw $this->createNotFoundException('Unable to find Department entity.');
                }
                $notify_email = $entity_department->getEmail();
            }

            if ($notify_to == 1) {
                //set mail to individual
                $notify_email = $notify_email;

            }


            $notify_body =  $this->renderView(
                                'GesEnquiryBundle:Enquiry:email.html.twig',
                                array('entity' => $entity,'notify_text'=>$notify_text)
                            );

            $message = \Swift_Message::newInstance()
                ->setSubject($notify_subject)
                ->setFrom($notify_from)
                ->setTo($notify_email)
                ->setBody($notify_body)
                ->setContentType("text/html")
            ;

            $this->get('mailer')->send($message);

        }
        $this->get('session')->setFlash(
            'notice',
            'The enquiry has been successfully notified to '.$notify_email
        );
        return $this->redirect($this->generateUrl('enquiry_notify', array('id' => $id)));
    }


}
