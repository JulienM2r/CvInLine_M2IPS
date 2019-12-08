<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Form\UserType;
use App\Entity\User;
use App\Entity\CV;
use App\Entity\NivExp;
use App\repository\NivExpRepository;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $cv = new CV();
            //dump($form->get('email')->getData());
            $dayto = new \DateTime() ;
            $user->setEmail($form->get('email')->getData());
            $user->setFirstname($form->get('Firstname')->getData());
            $user->setLastname($form->get('Lastname')->getData());
            $user->setUsername(str_replace ( ' ' , "-" , $form->get('Firstname')->getData()).'_'.str_replace( ' ' , "-" , $form->get('Lastname')->getData()));
            $user->setCreatedAt($dayto);
            $user->setEditedAt($dayto);
            $user->setRoles(['ROLE_USER']);
            // $user->setPassword(
            //     $passwordEncoder->encodePassword(
            //         $user,
            //         $form->get('plainPassword')->getData()
            //     )
            // );
            $password = $passwordEncoder->encodePassword($user, $form->get('plainPassword')->getData());
            $user->setPassword($password);            
            // $cv->setAge(36);
            $cv->setStatut(false);
            $cv->setTitre('Titre');
            $cv->setPhotoAvatar('Anonyme.jpg');
            /*$cv->setNivExp($manager
                ->getRepository('App\Entity\NivExp')
                ->findOneBySomeField('Junior'));*/
            $user->setCV($cv);
            $cv->setUser($user);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // $cv->setUser($user->getId());
            // Set flash messages
            




            $this->get('session')->getFlashBag()->add('success', 'Félicitation. Vous Pouvez maintenant créer votre CV !' );

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('user_cv_admin', array('slug' => $this->getUser()->getUsername(), 'id' => $this->getUser()->getId()));
        }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
}