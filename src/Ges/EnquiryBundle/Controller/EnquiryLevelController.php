<?php

namespace Ges\EnquiryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ges\EnquiryBundle\Entity\EnquiryLevel;
use Ges\EnquiryBundle\Form\EnquiryLevelType;

/**
 * EnquiryLevel controller.
 *
 * @Route("/enquirylevel")
 */
class EnquiryLevelController extends Controller
{
    /**
     * Lists all EnquiryLevel entities.
     *
     * @Route("/", name="enquirylevel")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GesEnquiryBundle:EnquiryLevel')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EnquiryLevel entity.
     *
     * @Route("/", name="enquirylevel_create")
     * @Method("POST")
     * @Template("GesEnquiryBundle:EnquiryLevel:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EnquiryLevel();
        $form = $this->createForm(new EnquiryLevelType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enquirylevel_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new EnquiryLevel entity.
     *
     * @Route("/new", name="enquirylevel_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EnquiryLevel();
        $form = $this->createForm(new EnquiryLevelType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a EnquiryLevel entity.
     *
     * @Route("/{id}", name="enquirylevel_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:EnquiryLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnquiryLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EnquiryLevel entity.
     *
     * @Route("/{id}/edit", name="enquirylevel_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:EnquiryLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnquiryLevel entity.');
        }

        $editForm = $this->createForm(new EnquiryLevelType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing EnquiryLevel entity.
     *
     * @Route("/{id}", name="enquirylevel_update")
     * @Method("PUT")
     * @Template("GesEnquiryBundle:EnquiryLevel:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:EnquiryLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnquiryLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EnquiryLevelType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enquirylevel_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_from' =>$deleteForm->createView(),
        );
    }


    /**
     * Deletes a EnquiryLevel entity.
     *
     * @Route("/{id}", name="enquirylevel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GesEnquiryBundle:EnquiryLevel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EnquiryLevel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enquirylevel'));
    }

    /**
     * Creates a form to delete a EnquiryLevel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
            ;
    }

}
