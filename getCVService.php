<?php

namespace App\Service;

use Doctrine\Bundle\FixturesBundle\Service;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\CV;
use App\repository\CVRepository;
use App\repository\UserRepository;
// use Symfony\Component\Validator\Constraints\DateTime;

class getCVService
{
    private $manager;

	public function __construct(EntityManagerInterface $manager) 
	{
		$this->manager = $manager;
	}

    public function getCVbyUsername(string $UserName): ?cv
    {
    	
        $UserCv = $this->manager
            ->getRepository('App\Entity\User')
            ->findOneByUsername($UserName);
        dump($UserCv->getUsername());
        $cv = $this->manager
            ->getRepository('App\Entity\CV')
            ->findOneByUser($UserCv);
        dump($cv->getTitre());    

        return $cv;
        
    }
}
