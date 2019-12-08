<?php

namespace App\Controller;

use App\Entity\CV;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
/*use Symfony\Component\HttpFoundation\Request;*/
use App\Service\getCVService;

class CvController extends AbstractController
{
    private $getCVService;

    public function __construct(getCVService $getCVService)
    {
        $this->getCVService = $getCVService;
    }

    public function cv(string $slug) //appel du service d'acquisition d'un CV
    {
        // $getCVService = new getCVService();    
        $cv = $this->getCVService->getCVbyUsername($slug);
        return $cv;
    }

    /**
     * @Route("/{slug}/cv/{id}", name="user_cv")
     */
    public function index(string $slug, int $id)
    {
		$msg = '';
        
        $cv = $this->cv($slug); //Get by class getCVService
        if ($cv){//cas du Username inconnu en base             
        
            if ($this->getUser()) {       
            		
        		if ($this->getUser()->getId() == $id) //si le User est propriétaire de la page
        		{
                    //dump($this->getUser()->getId());
                    if ($this->getUser()->getUsername() == $slug) //si le Username(slug) est == egal a user.username
                    {
                        //on renvoie vers sa page CV en mode admin
                        return $this->redirectToRoute('user_cv_admin', array('slug' => $this->getUser()->getUsername(), 'id' => $this->getUser()->getId()));
                    }
                	//dump($slug);        
                    //Sinon on le renvoit sur le CV d'un autre User en mode Visiteur
                    
                }     
                $cv = $this->cv($slug);
                $msg = '';//Pas de Message dans ce cas
                return $this->render('cv/index.html.twig', [
                            'controller_name' => 'CvAdminController', 'msg' => $msg, 'cv'=> $cv
                        ]);
            }
            $msg = 'Inscrivez vous et créez vous aussi votre CV en Ligne';
            //dump($slug);        
            return $this->render('cv/index.html.twig', [
                            'controller_name' => 'CvAdminController', 'msg' => $msg, 'cv'=> $cv
                        ]);
        }
        else
        {
            $msg = 'Aucun CV ne correspond à votre recherche';
            return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController', 'msg' => $msg
        ]);
        }

    }

    /**
     * @Route("/{slug}/cv", name="user_cv_anom")
     */
    /*public function indexAnom(string $slug)
    {     
        dump('out of user_cv_admin, no match Username avec :');
        dump($slug);
        dump($this->getUser()->getUsername());
        // dump($this->cv($slug)->getId());
        $cv = $this->cv($slug);
        
        return $this->redirectToRoute('user_cv', array('slug' => $slug, 'id' => $id, 'msg' => $msg));
        ]);
    }*/
}
