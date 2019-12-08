<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class CvAdminController extends AbstractController
{
    /**
     * @Route("/{slug}/cv/{id}/admin", name="user_cv_admin")
     */
    public function index(string $slug, int $id)
    {
        $msg = '';
        if ($this->getUser()){ //Y a t'il un User Connecté
            dump('dans user_cv_admin');
            if ($this->getUser()->getUsername() == $slug)
            {	 //si le User est propriétaire de la page 1/2
                dump('dans user_cv_admin avec route $slug = '. $slug . ' et User.Username = ' . $this->getUser()->getUsername());
                if ($this->getUser()->getId() == $id) //si le User est propriétaire de la page 2/2
                {
                    dump('dans user_cv_admin avec route $id = '. $id . ' et User.id = ' . $this->getUser()->getId());
                    $msg = 'Commencez a créer votre CV personalisé ';
            		$cv = $this->getUser()->getCv();       
                	
                        //On match le statut pour CV
                	if ($this->getUser()->getCv()->getStatut() != false){ //Message de bienvenue 
                		$resp = $this->getUser()->getCv()->getStatut();
                        $converted_res = $resp ? 'true' : 'false';
                        $msg = 'bienvenue, vous pouvez continuer a modifier votre CV'; //. $converted_res;
                	}
                	else
                	{
                    	
                    }
            	               
            	    return $this->render('cv/index.html.twig', [
                        'controller_name' => 'CvAdminController', 'msg' => $msg, 'cv'=> $cv//, 'statut' => $converted_res
                    ]);

                }
                // dump('out of user_cv_admin, no match Username');
                return $this->redirectToRoute('user_cv', array('slug' => $slug, 'id' => $id, 'msg' => $msg));
            }
            // dump('out of user_cv_admin, no match Id');
            return $this->redirectToRoute('user_cv', array('slug' => $slug, 'id' => $id, 'msg' => $msg));
        }
        // dump('out of user_cv_admin, no match Id');

        return $this->redirectToRoute('user_cv', array('slug' => $slug, 'id' => $id, 'msg' => $msg));
    }    
}
