<?php

namespace WCW\CoavBundle\Controller;

use WCW\CoavBundle\Entity\Flight;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Flight controller.
 *
 */
class FlightController extends Controller
{
    /**
     * Lists all flight entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $flights = $em->getRepository('WCWCoavBundle:Flight')->findAll();

        return $this->render('flight/index.html.twig', array(
            'flights' => $flights,
        ));
    }

    /**
     * Finds and displays a flight entity.
     *
     */
    public function showAction(Flight $flight)
    {

        return $this->render('flight/show.html.twig', array(
            'flight' => $flight,
        ));
    }
}
