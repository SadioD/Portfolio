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
            [
                'graduationYear' => '2004',
                'country'        => 'Morocco',
                'degree'         => 'Diploma In UI/UX Design',
                'shortDesc'      => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'graduationYear' => '2006',
                'country'        => 'New York',
                'degree'         => 'Diploma In Web Design',
                'shortDesc'      => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'graduationYear' => '2008',
                'country'        => 'Toronto',
                'degree'         => 'Diploma In Web Marketing',
                'shortDesc'      => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'graduationYear' => '2010',
                'country'        => 'Paris',
                'degree'         => 'Diploma In Trafic Management',
                'shortDesc'      => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
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