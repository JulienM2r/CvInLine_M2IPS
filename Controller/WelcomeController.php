<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\RegistrationController;
use App\Controller\LoginController;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="app_welcome")
     */
    public function index()
    {
        
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController', 'msg' => ''
        ]);
    }
}
