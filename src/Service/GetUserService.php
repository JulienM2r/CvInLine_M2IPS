<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Entity\User;
use App\Repository\UserRepository;
// use Symfony\Component\Validator\Constraints\DateTime;

class GetUserService
{
    private $UserRepo;

	public function __construct(UserRepository $UserRepo)
	{
		 $this->UserRepo = $UserRepo;
	}

    public function getUserEntity(ObjectManager $manager)
    {
    	/*$userEntity = $UserRepo
            ->findOneByEmail($this->getUser()
                ->getUsername()); */
        
        return $userEntity;

        
    }
}
