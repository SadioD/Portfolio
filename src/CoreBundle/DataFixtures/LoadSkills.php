<?php
// Permet de charger Skills en BDD
namespace CoreBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Skills;
use CoreBundle\Entity\Image;

class LoadSkills extends Fixture 
{
    public function load(ObjectManager $manager) 
    {
        // Lets create a list of Skills
        /*$list = [
            [
                
                'name'       => 'Web Development',
                'shortDesc'  => 'website building and maintenance',
                'htmlID'     =>  '1',
                'htmlClass'  => 'prt_services_slider_text prt_img_click active',
            ],
            [
                
                'name'       => 'SEO Specialist',
                'shortDesc'  => 'website optimization, Search Engine rankings improvement',
                'htmlID'     =>  '2',
                'htmlClass'  => 'prt_services_slider_text prt_img_click',
            ],
            [
                
                'name'       => 'Mobile Development',
                'shortDesc'  => 'cross-patform mobile app development',
                'htmlID'     =>  '3',
                'htmlClass'  => 'prt_services_slider_text prt_img_click',
            ],
            [
                
                'name'       => 'Web Marketing',
                'shortDesc'  => 'online promotion, traffic management',
                'htmlID'     =>  '4',
                'htmlClass'  => 'prt_services_slider_text prt_img_click',
            ]            
        ];

        $imageList = [
            [
                'alt' => 'Web Dev Image',
                'url' => 'web_dev_logo.png'
            ],
            [
                'alt' => 'SEO Image',
                'url' => 'seo_logo.png'
            ],
            [
                'alt' => 'Mobile Image',
                'url' => 'mobile_app_logo.png'
            ],
            [
                'alt' => 'WebMarketing Image',
                'url' => 'web_mktg_logo.png'
            ]
        ];

        
        for ($i=0; $i < count($list); $i++) 
        {
            $skills = new Skills($list[$i]);
            $image   = new Image($imageList[$i]);
            
            $skills->setImage($image);
            $manager->persist($skills);
        }
        $manager->flush();*/
    }
}