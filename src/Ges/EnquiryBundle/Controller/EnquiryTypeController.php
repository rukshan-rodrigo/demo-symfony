<?php

namespace Ges\EnquiryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ges\EnquiryBundle\Entity\EnquiryType;
use Ges\EnquiryBundle\Form\EnquiryTypeType;

/**
 * EnquiryType controller.
 *
 * @Route("/enquirytype")
 */
class EnquiryTypeController extends Controller
{
    /**
     * Lists all EnquiryType entities.
     *
     * @Route("/", name="enquirytype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GesEnquiryBundle:EnquiryType')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new EnquiryType entity.
     *
     * @Route("/", name="enquirytype_create")
     * @Method("POST")
     * @Template("GesEnquiryBundle:EnquiryType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EnquiryType();
        $form = $this->createForm(new EnquiryTypeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enquirytype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new EnquiryType entity.
     *
     * @Route("/new", name="enquirytype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EnquiryType();
        $form = $this->createForm(new EnquiryTypeType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a EnquiryType entity.
     *
     * @Route("/{id}", name="enquirytype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:EnquiryType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnquiryType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EnquiryType entity.
     *
     * @Route("/{id}/edit", name="enquirytype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:EnquiryType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnquiryType entity.');
        }

        $editForm = $this->createForm(new EnquiryTypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing EnquiryType entity.
     *
     * @Route("/{id}", name="enquirytype_update")
     * @Method("PUT")
     * @Template("GesEnquiryBundle:EnquiryType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GesEnquiryBundle:EnquiryType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EnquiryType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EnquiryTypeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('enquirytype_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a EnquiryType entity.
     *
     * @Route("/{id}", name="enquirytype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GesEnquiryBundle:EnquiryType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EnquiryType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('enquirytype'));
    }

    /**
     * Creates a form to delete a EnquiryType entity by id.
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
}
