<?php

namespace WCW\CoavBundle\Controller;

use WCW\CoavBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Reservation controller.
 *
 */
class ReservationController extends Controller
{
    /**
     * Lists all reservation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('WCWCoavBundle:Reservation')->findAll();

        return $this->render('reservation/index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     */
    public function showAction(Reservation $reservation)
    {

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
        ));
    }
}
