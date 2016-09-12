<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookingSessionController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:BookingSession:index.html.twig', array(
            // ...
        ));
    }

    public function bookSessionAction()
    {
        return $this->render('AppBundle:BookingSession:book_session.html.twig', array(
            // ...
        ));
    }

    public function updateSessionAction()
    {
        return $this->render('AppBundle:BookingSession:update_session.html.twig', array(
            // ...
        ));
    }

    public function showSessionAction($id)
    {
        return $this->render('AppBundle:BookingSession:show_session.html.twig', array(
            // ...
        ));
    }

    public function removeSessionAction($id)
    {
        return $this->render('AppBundle:BookingSession:remove_session.html.twig', array(
            // ...
        ));
    }

}
