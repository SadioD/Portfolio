<?php
// Permet de charger Education en BDD
namespace CoreBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Education;

class LoadEducation extends Fixture 
{
    public function load(ObjectManager $manager) 
    {
        // Lets create a list of Education
        $list = [
         /*[
                'graduationYear'  => '2004',
                'country'         => 'Morocco',
                'degree'          => 'Diploma In UI/UX Design',
                'shortDesc'       => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.',
                'firstHtmlClass'  => 'col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-6 col-md-offset-6 col-sm-offset-0 col-xs-offset-0',
                'secondHtmlClass' => 'prt_about_learnbox_right'
            ],*/
            [
                'graduationYear'  => '2003',
                'country'         => 'Morocco',
                'degree'          => 'Bachelor of BA',
                'shortDesc'       => 'Business Administration, Finance, Accounting, Management and Leadership, Business Strategy',
                                      
                'firstHtmlClass'  => 'col-lg-6 col-md-6 col-sm-12 col-xs-12',
                'secondHtmlClass' => 'prt_about_learnbox_left'
            ],
            [
                'graduationYear'  => '2010',
                'country'         => 'Morocco',
                'degree'          => 'Master of Sales Management',
                'shortDesc'       => 'Strategic Marketing, Strategic Sales Management, Business Development Strategy, Customer Relationship Management',
                'firstHtmlClass'  => 'col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-6 col-md-offset-6 col-sm-offset-0 col-xs-offset-0',
                'secondHtmlClass' => 'prt_about_learnbox_right'
            ],
            [
                'graduationYear'  => '2012',
                'country'         => 'France',
                'degree'          => 'Master of Web Marketing',
                'shortDesc'       => 'Digital Marketing, Graphic Design, Search Engine Optimization, Search Media Optimization, Search Engine Advertising',
                'firstHtmlClass'  => 'col-lg-6 col-md-6 col-sm-12 col-xs-12'   ,
                'secondHtmlClass' => 'prt_about_learnbox_left'
            ]
        ];
        
        for ($i=0; $i < count($list); $i++) 
        {
            $education = new Education($list[$i]);
            $manager->persist($education);
        }
        $manager->flush();
    }
}