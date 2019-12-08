<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\CV;
use App\Entity\NivExp;
use App\repository\NivExpRepository;
// use Symfony\Component\Validator\Constraints\DateTime;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}

    public function load(ObjectManager $manager)
    {
    	$dayto = new \DateTime() ;
        $user = new User(); 
        $cv = new CV();
        $user->setEmail('jum2r5@hotmail.com');
        $user->setFirstname('Julien');
        $user->setLastname('Morgan de Rivery');
        $user->setUsername(str_replace ( ' ' , "-" , $user->getFirstname()).'_'.str_replace( ' ' , "-" , $user->getLastname()));

        // $user->setUsername('JulienM2r');     
        $user->setRoles(['ROLE_USER']);
		$user->setCreatedAt($dayto);
		$user->setEditedAt($dayto);
		$user->setPassword($this->passwordEncoder->encodePassword($user, 'test'));
        $cv->setTitre('Develloper Junior Back-end');
        $cv->setAge(36);
        $cv->setStatut(true);
        $cv->setNivExp($manager
            ->getRepository('App\Entity\NivExp')
            ->findOneBySomeField('Junior'));
        $user->setCV($cv);


        $manager->persist($user);

        $manager->flush();
    }
}
