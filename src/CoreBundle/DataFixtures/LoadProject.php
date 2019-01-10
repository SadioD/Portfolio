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
        /*$list = [
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
                'alt' => 'Symfony JobSearch Image',
                'url' => 'jobsearch.png'
            ],
            [
                'alt' => 'CodeIgniter Blog Image',
                'url' => 'cod_blog.png'
            ],
            [
                'alt' => 'Racing Game Image',
                'url' => 'racing_game.png'
            ],
            [
                'alt' => 'Angular Project Image',
                'url' => 'angular.png'
            ],
            [
                'alt' => 'Chatroom Project Image',
                'url' => 'cod_chatroom.png'
            ],
            [
                'alt' => 'Image Mahatma Gandhi',
                'url' => 'lycee_gandhi.png'
            ],
            [
                'alt' => 'Image Afdal Group',
                'url' => 'afdal.png'
            ],
            [
                'alt' => 'Image Société Civile',
                'url' => 'societe_civile.png'
            ]
        ];

        
        for ($i=0; $i < count($list); $i++) 
        {
            $project = new Project($list[$i]);
            $image   = new Image($imageList[$i]);
            
            $project->setImage($image);
            $manager->persist($project);
        }
        $manager->flush();*/
    }
}