<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Specialist;

/**
 * Class SpecialistController
 * @package AppBundle\Controller
 */
class SpecialistController extends Controller
{
    /**
     * Lists all Specialist entities.
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $specialists = $em->getRepository('AppBundle:Specialist')->getElements();

        return $this->render('AppBundle:specialist:index.html.twig', [
            'specialists' => $specialists
        ]);
    }

    /**
     * Creates a new Specialist entity.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $specialist = new Specialist();
        $form = $this->createForm('AppBundle\Form\SpecialistType', $specialist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($specialist);
            $em->flush();

            return $this->redirectToRoute('specialist_show', [
                'id' => $specialist->getId()
            ]);
        }

        return $this->render('AppBundle:specialist:new.html.twig', [
            'specialist' => $specialist,
            'form' => $form->createView()
        ]);
    }

    /**
     * Finds and displays a Specialist entity.
     * @param Specialist $specialist
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Specialist $specialist)
    {
        $deleteForm = $this->createDeleteForm($specialist);

        return $this->render('AppBundle:specialist:show.html.twig', [
            'specialist' => $specialist,
            'delete_form' => $deleteForm->createView()
        ]);
    }

    /**
     * Displays a form to edit an existing Specialist entity.
     * @param Request $request
     * @param Specialist $specialist
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Specialist $specialist)
    {
        $deleteForm = $this->createDeleteForm($specialist);
        $editForm = $this->createForm('AppBundle\Form\SpecialistType', $specialist);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($specialist);
            $em->flush();

            return $this->redirectToRoute('specialist_edit', ['id' => $specialist->getId()]);
        }

        return $this->render('AppBundle:specialist:edit.html.twig', [
            'specialist' => $specialist,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ]);
    }

    /**
     * Deletes a Specialist entity.
     * @param Request $request
     * @param Specialist $specialist
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Specialist $specialist)
    {
        $form = $this->createDeleteForm($specialist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($specialist);
            $em->flush();
        }

        return $this->redirectToRoute('specialist_index');
    }

    /**
     * Creates a form to delete a Specialist entity.
     * @param Specialist $specialist
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(Specialist $specialist)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('specialist_delete', ['id' => $specialist->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds by specialist and displays a session & operating rooms entity.
     * @param Specialist $specialist
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getSessionAndORBySpecialistAction(Specialist $specialist)
    {
        $results = $this->get('app.process.manager')
            ->getSessionAndORBySpecialist($specialist->getId());

        return $this->render('AppBundle:specialist:show_session_and_or.html.twig', [
            'results' => $results
        ]);
    }

    /**
     * Check specialist availability in particular time slot.
     * @param \DateTime $from
     * @param \DateTime $to
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function checkSpecialistAvailableTimeSlotAction(\DateTime $from, \DateTime $to)
    {
        $isAvailable = $this->get('app.process.manager')
            ->checkSpecialistAvailableTimeSlot($from, $to);

        return $this->render('AppBundle:specialist:show_availablity_status.html.twig', [
            'isAvailable' => $isAvailable
        ]);
    }
}
