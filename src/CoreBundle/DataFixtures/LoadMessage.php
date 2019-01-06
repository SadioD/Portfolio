<?php
// Permet de charger Message en BDD
namespace CoreBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Message;

class LoadMessage extends Fixture 
{
    public function load(ObjectManager $manager) 
    {
        // Lets create a list of Message
        /*$list = [
            [
                'authorName'  => 'Grasset',
                'authorEmail' => 'grasset@gmail.com',
                'subject'     => 'Sexy girl',
                'content'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'authorName'  => 'Hope',
                'authorEmail' => 'hope@gmail.com',
                'subject'     => 'Sexy daughter',
                'content'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ],
            [
                'authorName'  => 'Bébé',
                'authorEmail' => 'bebe@gmail.com',
                'subject'     => 'Sexy mamy',
                'content'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.'
            ]
        ];
        
        for ($i=0; $i < count($list); $i++) 
        {
            $message = new Message($list[$i]);
            $manager->persist($message);
        }
        $manager->flush();*/
    }
}