<?php

namespace WCW\CoavBundle\Controller;

use WCW\CoavBundle\Entity\PlanelModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Planelmodel controller.
 *
 */
class PlanelModelController extends Controller
{
    /**
     * Lists all planelModel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $planelModels = $em->getRepository('WCWCoavBundle:PlanelModel')->findAll();

        return $this->render('planelmodel/index.html.twig', array(
            'planelModels' => $planelModels,
        ));
    }

    /**
     * Creates a new planelModel entity.
     *
     */
    public function newAction(Request $request)
    {
        $planelModel = new Planelmodel();
        $form = $this->createForm('WCW\CoavBundle\Form\PlanelModelType', $planelModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($planelModel);
            $em->flush($planelModel);

            return $this->redirectToRoute('planelmodel_show', array('id' => $planelModel->getId()));
        }

        return $this->render('planelmodel/new.html.twig', array(
            'planelModel' => $planelModel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a planelModel entity.
     *
     */
    public function showAction(PlanelModel $planelModel)
    {
        $deleteForm = $this->createDeleteForm($planelModel);

        return $this->render('planelmodel/show.html.twig', array(
            'planelModel' => $planelModel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing planelModel entity.
     *
     */
    public function editAction(Request $request, PlanelModel $planelModel)
    {
        $deleteForm = $this->createDeleteForm($planelModel);
        $editForm = $this->createForm('WCW\CoavBundle\Form\PlanelModelType', $planelModel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('planelmodel_edit', array('id' => $planelModel->getId()));
        }

        return $this->render('planelmodel/edit.html.twig', array(
            'planelModel' => $planelModel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a planelModel entity.
     *
     */
    public function deleteAction(Request $request, PlanelModel $planelModel)
    {
        $form = $this->createDeleteForm($planelModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($planelModel);
            $em->flush();
        }

        return $this->redirectToRoute('planelmodel_index');
    }

    /**
     * Creates a form to delete a planelModel entity.
     *
     * @param PlanelModel $planelModel The planelModel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PlanelModel $planelModel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('planelmodel_delete', array('id' => $planelModel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
