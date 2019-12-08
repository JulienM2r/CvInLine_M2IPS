<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\NivExp;

class NivExpFixtures extends Fixture
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {

        // dump('heyyyy');

        // Liste des Niveau d'expérience à ajouter
        $names = array(
            'Junior',
            'Confirmé',
            'Sénior',
            'Expert'
        );
        foreach ($names as $name) {
        // On crée la catégorie
            // dump('heyyyy');
            $nivExp = new NivExp();
            $nivExp->setName($name);
            //On la persiste
            $manager->persist($nivExp);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }

}