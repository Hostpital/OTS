<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\OperatingRoom;

/**
 * Class OperatingRoomController
 * @package AppBundle\Controller
 */
class OperatingRoomController extends Controller
{
    /**
     * Lists all OperatingRoom entities.
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operatingRooms = $em->getRepository('AppBundle:OperatingRoom')->getElements();

        return $this->render('AppBundle:operatingroom:index.html.twig', array(
            'operatingRooms' => $operatingRooms,
        ));
    }

    /**
     * Creates a new OperatingRoom entity.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $operatingRoom = new OperatingRoom();
        $form = $this->createForm('AppBundle\Form\OperatingRoomType', $operatingRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operatingRoom);
            $em->flush();

            return $this->redirectToRoute('operatingroom_show', array('id' => $operatingRoom->getId()));
        }

        return $this->render('AppBundle:operatingroom:new.html.twig', array(
            'operatingRoom' => $operatingRoom,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a OperatingRoom entity.
     * @param OperatingRoom $operatingRoom
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(OperatingRoom $operatingRoom)
    {
        $deleteForm = $this->createDeleteForm($operatingRoom);

        return $this->render('AppBundle:operatingroom:show.html.twig', array(
            'operatingRoom' => $operatingRoom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing OperatingRoom entity.
     * @param Request $request
     * @param OperatingRoom $operatingRoom
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, OperatingRoom $operatingRoom)
    {
        $deleteForm = $this->createDeleteForm($operatingRoom);
        $editForm = $this->createForm('AppBundle\Form\OperatingRoomType', $operatingRoom);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operatingRoom);
            $em->flush();

            return $this->redirectToRoute('operatingroom_edit', array('id' => $operatingRoom->getId()));
        }

        return $this->render('AppBundle:operatingroom:edit.html.twig', array(
            'operatingRoom' => $operatingRoom,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a OperatingRoom entity.
     * @param Request $request
     * @param OperatingRoom $operatingRoom
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, OperatingRoom $operatingRoom)
    {
        $form = $this->createDeleteForm($operatingRoom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operatingRoom);
            $em->flush();
        }

        return $this->redirectToRoute('operatingroom_index');
    }

    /**
     * Creates a form to delete a OperatingRoom entity.
     * @param OperatingRoom $operatingRoom
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(OperatingRoom $operatingRoom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operatingroom_delete', array('id' => $operatingRoom->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Find by operating room and displays session, specialist & anesthetist entity.
     * @param OperatingRoom $operatingRoom
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getSessionSpecialistAndAnesthetistAction(OperatingRoom $operatingRoom)
    {
        $results = $this->get('app.process.manager')
            ->getSessionSpecialistAndAnesthetistByOr($operatingRoom->getId());

        return $this->render('AppBundle:operatingroom:show_specific_or.html.twig', array(
            'results' => $results,
            'operatingRoom' => $operatingRoom
        ));
    }
}
