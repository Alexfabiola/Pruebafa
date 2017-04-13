<?php

namespace PruebaBundle\Controller;

use PruebaBundle\Entity\Visita;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Visita controller.
 *
 * @Route("visita")
 */
class VisitaController extends Controller
{
    /**
     * Lists all visita entities.
     *
     * @Route("/", name="visita_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $visitas = $em->getRepository('PruebaBundle:Visita')->findAll();

        return $this->render('visita/index.html.twig', array(
            'visitas' => $visitas,
        ));
    }

    /**
     * Creates a new visita entity.
     *
     * @Route("/new", name="visita_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $visita = new Visita();
        $form = $this->createForm('PruebaBundle\Form\VisitaType', $visita);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($visita);
            $em->flush();

            return $this->redirectToRoute('visita_show', array('id' => $visita->getId()));
        }

        return $this->render('visita/new.html.twig', array(
            'visita' => $visita,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a visita entity.
     *
     * @Route("/{id}", name="visita_show")
     * @Method("GET")
     */
    public function showAction(Visita $visita)
    {
        $deleteForm = $this->createDeleteForm($visita);

        return $this->render('visita/show.html.twig', array(
            'visita' => $visita,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing visita entity.
     *
     * @Route("/{id}/edit", name="visita_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Visita $visita)
    {
        $deleteForm = $this->createDeleteForm($visita);
        $editForm = $this->createForm('PruebaBundle\Form\VisitaType', $visita);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('visita_edit', array('id' => $visita->getId()));
        }

        return $this->render('visita/edit.html.twig', array(
            'visita' => $visita,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a visita entity.
     *
     * @Route("/{id}", name="visita_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Visita $visita)
    {
        $form = $this->createDeleteForm($visita);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($visita);
            $em->flush();
        }

        return $this->redirectToRoute('visita_index');
    }

    /**
     * Creates a form to delete a visita entity.
     *
     * @param Visita $visita The visita entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Visita $visita)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('visita_delete', array('id' => $visita->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
