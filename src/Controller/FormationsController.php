<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\FormationFormType;
use App\Entity\Formation;
use App\Entity\CV;

class FormationsController extends AbstractController
{
    /**
     * @Route("/{slug}/addformations", name="addformations")
     */
    public function index(Request $request): Response
    {
        $slug = $this->getUser()->getUsername();
        $msg = 'erreur lors de la création du formulaire, veuillez réessayer';
        $cv = $this->getUser()->getCv();
        // 1) build the form
        $formation = new Formation;
        $form = $this->createForm(FormationFormType::class, $formation);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        // 3) Get the data from the form	
        	$formation->setName($form->get('name')->getData());
        	$formation->setName($form->get('Date_Debut')->getData());
        	$formation->setName($form->get('Date_Fin')->getData());
        	$formation->setName($form->get('ecole')->getData());
        	$formation->setName($form->get('niveau')->getData());
        	$formation->setName($form->get('description')->getData());
        	$formation->setName($form->get('name')->getData());

        	
        	$cv->addFormation($formation);
        	// 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formation);
            $entityManager->flush();

	        $msg = 'Votre Nouvelle Formation est bien créée, bien joué !';
	        return $this->redirectToRoute('user_cv_admin', array('slug' => $this->getUser()->getUsername(), 'id' => $this->getUser()->getId(), 'msg' => $msg));
	    }
	    return $this->render('formations/index.html.twig', 
            array('form' => $form->createView())
        );
    }
}
