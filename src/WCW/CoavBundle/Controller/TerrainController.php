<?php

namespace WCW\CoavBundle\Controller;

use WCW\CoavBundle\Entity\Terrain;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Terrain controller.
 *
 */
class TerrainController extends Controller
{
    /**
     * Lists all terrain entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $terrains = $em->getRepository('WCWCoavBundle:Terrain')->findAll();

        return $this->render('terrain/index.html.twig', array(
            'terrains' => $terrains,
        ));
    }

    /**
     * Finds and displays a terrain entity.
     *
     */
    public function showAction(Terrain $terrain)
    {

        return $this->render('terrain/show.html.twig', array(
            'terrain' => $terrain,
        ));
    }
}
