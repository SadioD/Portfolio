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
        $list = [
            [
                'startingYear'  => '2012',
                'startingMonth' => 'July',
                'endingDate'    => '2013 Sep',
                'position'      => 'Junior Ui/Ux Designer',
                'company'       => 'Amazon',
                'shortDesc'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'startingYear'  => '2013',
                'startingMonth' => 'Oct',
                'endingDate'    => '2014 Dec',
                'position'      => 'Senior Ui/Ux Designer',
                'company'       => 'Adobe',
                'shortDesc'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'startingYear'  => '2015',
                'startingMonth' => 'Jun',
                'endingDate'    => '2015 March',
                'position'      => 'Senior Ui/Ux Designer',
                'company'       => 'Acticall Group',
                'shortDesc'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'startingYear'  => '2016',
                'startingMonth' => 'April',
                'endingDate'    => 'Present',
                'position'      => 'Lead Ui/Ux Designer',
                'company'       => 'Google',
                'shortDesc'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ]
        ];
        
        for ($i=0; $i < count($list); $i++) 
        {
            $experience = new Experience($list[$i]);
            $manager->persist($experience);
        }
        $manager->flush();
    }
}