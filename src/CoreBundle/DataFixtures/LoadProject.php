<?php
// Permet de charger Project en BDD
namespace CoreBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Project;
use CoreBundle\Entity\Image;

class LoadProject extends Fixture 
{
    public function load(ObjectManager $manager) 
    {
        // Lets create a list of Project
        $list = [
            [
                'url'        => 'url/test.com',
                'title'      => 'Symfony',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive Platform'
            ],
            [
                'url'        => 'url/test.com',
                'title'      => 'CodeIgniter',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive Blog'
            ],
            [
                'url'        => 'url/test.com',
                'title'      => 'jQuery',
                'responsive' =>  false,
                'shortDesc'  => '2D Racing Game (Computer required)'
            ],
            [
                'url'        => 'url/test.com',
                'title'      => 'jQuery (& UI)',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive Chatroom'
            ]
        ];

        $imageList = [
            [
                'alt' => 'Symfony Project Image',
                'url' => 'http://placehold.it/370X370'
            ],
            [
                'alt' => 'CodeIgniter Project Image',
                'url' => 'http://placehold.it/370X369'
            ],
            [
                'alt' => 'Jquery Project Image',
                'url' => 'http://placehold.it/370X460'
            ],
            [
                'alt' => 'Jquery Project Image',
                'url' => 'http://placehold.it/370X280'
            ]
        ];

        
        for ($i=0; $i < count($list); $i++) 
        {
            $project = new Project($list[$i]);
            $image   = new Image($imageList[$i]);
            
            $project->setImage($image);
            $manager->persist($project);
        }
        $manager->flush();
    }
}