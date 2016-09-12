<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Anesthetist;

/**
 * Anesthetist controller.
 *
 */
class AnesthetistController extends Controller
{
    /**
     * Lists all Anesthetist entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $anesthetists = $em->getRepository('AppBundle:Anesthetist')->getElements();

        return $this->render('AppBundle:anesthetist:index.html.twig', array(
            'anesthetists' => $anesthetists,
        ));
    }

    /**
     * Creates a new Anesthetist entity.
     *
     */
    public function newAction(Request $request)
    {
        $anesthetist = new Anesthetist();
        $form = $this->createForm('AppBundle\Form\AnesthetistType', $anesthetist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($anesthetist);
            $em->flush();

            return $this->redirectToRoute('anesthetist_show', array('id' => $anesthetist->getId()));
        }

        return $this->render('AppBundle:anesthetist:new.html.twig', array(
            'anesthetist' => $anesthetist,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Anesthetist entity.
     *
     */
    public function showAction(Anesthetist $anesthetist)
    {
        $deleteForm = $this->createDeleteForm($anesthetist);

        return $this->render('AppBundle:anesthetist:show.html.twig', array(
            'anesthetist' => $anesthetist,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Anesthetist entity.
     *
     */
    public function editAction(Request $request, Anesthetist $anesthetist)
    {
        $deleteForm = $this->createDeleteForm($anesthetist);
        $editForm = $this->createForm('AppBundle\Form\AnesthetistType', $anesthetist);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($anesthetist);
            $em->flush();

            return $this->redirectToRoute('anesthetist_edit', array('id' => $anesthetist->getId()));
        }

        return $this->render('AppBundle:anesthetist:edit.html.twig', array(
            'anesthetist' => $anesthetist,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Anesthetist entity.
     *
     */
    public function deleteAction(Request $request, Anesthetist $anesthetist)
    {
        $form = $this->createDeleteForm($anesthetist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($anesthetist);
            $em->flush();
        }

        return $this->redirectToRoute('anesthetist_index');
    }

    /**
     * Creates a form to delete a Anesthetist entity.
     *
     * @param Anesthetist $anesthetist The Anesthetist entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Anesthetist $anesthetist)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('anesthetist_delete', array('id' => $anesthetist->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
