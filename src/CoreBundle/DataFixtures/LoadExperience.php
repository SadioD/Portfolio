<?php
// Permet de charger Experience en BDD
namespace CoreBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Experience;

class LoadExperience extends Fixture 
{
    public function load(ObjectManager $manager) 
    {
        // Lets create a list of Experience
        /*$list = [
            [
                'startingYear'  => '2012',
                'startingMonth' => 'Dec',
                'endingDate'    => '2013 Dec',
                'position'      => 'Chargé d\'études MKTG',
                'company'       => 'MV2 Group',
                'shortDesc'     => 'Supervision d\'enquêtes de satisfaction pour le compte du Syndicat des Transports en Ile de France'
            ],
            [
                'startingYear'  => '2014',
                'startingMonth' => 'March',
                'endingDate'    => '2016 Oct',
                'position'      => 'Responsable Clientèle',
                'company'       => 'Acticall Group',
                'shortDesc'     => 'Supervision de centres d\'appels. Définition et suivi des objectifs. Formation et évaluation de collaborateurs'
            ],
            [
                'startingYear'  => '2017',
                'startingMonth' => 'Feb',
                'endingDate'    => '2019 Jul',
                'position'      => 'Responsable SEO',
                'company'       => 'Free Field MKTG',
                'shortDesc'     => 'Amélioration du positionnement dans les moteurs de recherche. Optimisation de site web. Optimisation du Netlinking'
            ],
            [
                'startingYear'  => '2017',
                'startingMonth' => 'April',
                'endingDate'    => 'Present',
                'position'      => 'Développeur/Designer',
                'company'       => 'Freelance',
                'shortDesc'     => 'Développement d\'applications web et mobile. Gestion de base de données. Création graphique (flyers, logos...)'
            ]
        ];
        
        for ($i=0; $i < count($list); $i++) 
        {
            $experience = new Experience($list[$i]);
            $manager->persist($experience);
        }
        $manager->flush();*/
    }
}