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
                'url'        => 'url/test_a.com',
                'name'       => 'Symfony',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive Platform',
                'loopStatus' => 'start',
                'titleInfo'  => 'Frameworks/Libraries : Symfony 3, Bootstrap 4'
            ],
            [
                'url'        => 'url/test_b.com',
                'name'       => 'CodeIgniter',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive Blog',
                'loopStatus' => 'end',
                'titleInfo'  => 'Frameworks/Libraries : CodeIgniter 3, Bootstrap 4, jQuery'
            ],
            [
                'url'        => 'url/test_c.com',
                'name'       => 'jQuery',
                'responsive' =>  false,
                'shortDesc'  => '2D Racing Game (Computer required)',
                'loopStatus' => 'start',
                'titleInfo'  => 'This game is NOT compatible with Smartphones'
            ],
            [
                'url'        => 'frameworks/angular/premier-projet/',
                'name'       => 'Angular',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive Platform',
                'loopStatus' => 'end',
                'titleInfo'  => 'Frameworks/Libraries : Angular 6, CodeIgniter 3, jQuery'
            ],
            [
                'url'        => 'url/test_d.com',
                'name'       => 'jQuery (& UI)',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive Chatroom',
                'loopStatus' => 'start',
                'titleInfo'  => 'Frameworks/Libraries : CodeIgniter 3, jQuery and UI'
            ],
            [
                'url'        => 'http://etudiant.univgandhiguinee.com',
                'name'       => 'Symfony',
                'responsive' =>  false,
                'shortDesc'  => 'A School Management Platform',
                'loopStatus' => 'end',
                'titleInfo'  => 'Frameworks/Libraries : Symfony and Bootstrap'
            ],
            [
                'url'        => 'http://afdalgroup.com',
                'name'       => 'WordPress',
                'responsive' =>  false,
                'shortDesc'  => 'Farming and AgriFood Website',
                'loopStatus' => 'start',
                'titleInfo'  => 'CMS : WordPress'
            ],
            [
                'url'        => 'http://societecivileguineenne.org',
                'name'       => 'WordPress',
                'responsive' =>  false,
                'shortDesc'  => 'Guinea Civil Society Platform',
                'loopStatus' => 'end',
                'titleInfo'  => 'CMS : WordPress'
            ]
        ];

        $imageList = [
            [
                'alt' => 'Symfony Project Image',
                'url' => 'http://placehold.it/370X370'
            ],
            [
                'alt' => 'CodeIgniter Project Image',
                'url' => 'http://placehold.it/370X370'
            ],
            [
                'alt' => 'Jquery Project Image',
                'url' => 'http://placehold.it/370X460'
            ],
            [
                'alt' => 'Angular Project Image',
                'url' => 'http://placehold.it/370X280'
            ],
            [
                'alt' => 'Jquery Project Image',
                'url' => 'http://placehold.it/370X280'
            ],
            [
                'alt' => 'test IDI-1',
                'url' => 'http://placehold.it/370X460'
            ],
            [
                'alt' => 'test IDI-2',
                'url' => 'http://placehold.it/370X370'
            ],
            [
                'alt' => 'test IDI-3',
                'url' => 'http://placehold.it/370X370'
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