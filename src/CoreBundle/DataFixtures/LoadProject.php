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
                'url'        => 'url/test_e.com',
                'name'       => 'Test IDI 1',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive IDI-1',
                'loopStatus' => 'end',
                'titleInfo'  => 'IDI\'s Project Info'
            ],
            [
                'url'        => 'url/test_f.com',
                'name'       => 'Test IDI 2',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive IDI-2',
                'loopStatus' => 'start',
                'titleInfo'  => 'IDI\'s Project Info'
            ],
            [
                'url'        => 'url/test_g.com',
                'name'       => 'Test IDI 3',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive IDI-3',
                'loopStatus' => 'end',
                'titleInfo'  => 'IDI\'s Project Info'
            ],
            [
                'url'        => 'url/test_h.com',
                'name'       => 'Test IDI 4',
                'responsive' =>  true,
                'shortDesc'  => 'Responsive IDI-4',
                'loopStatus' => 'start',
                'titleInfo'  => 'IDI\'s Project Info'
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
            ],
            [
                'alt' => 'test IDI-4',
                'url' => 'http://placehold.it/370X460'
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