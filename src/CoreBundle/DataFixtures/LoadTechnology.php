<?php
// Permet de charger Technology en BDD
namespace CoreBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Technology;

class LoadTechnology extends Fixture 
{
    public function load(ObjectManager $manager) 
    {
        // Lets create a list of Technology
        $list = [
            [
                'iconUrl'       => 'fa fa-github fa-4x githubColor',
                'iconLabel'     => 'Github',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://github.com/'
            ],
            [
                'iconUrl'       => 'fa fa-html5 fa-4x htmlColor',
                'iconLabel'     => 'HTML5',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://fr.wikipedia.org/wiki/HTML5'
            ],
            /*[
                'iconUrl'       => 'fa fa-code',
                'iconLabel'     => 'HTML5',
                'seoFollow'     => true
                'redirectUrl'   => ''
            ],*/
            [
                'iconUrl'       => 'fa fa-css3 fa-4x cssColor',
                'iconLabel'     => 'CSS',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3'
            ],
            [
                'iconUrl'       => 'fa fa-bitbucket fa-4x bitbucketColor',
                'iconLabel'     => 'Bitbucket',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://bitbucket.org/'
            ],
            [
                'iconUrl'       => 'fa fa-database fa-4x dbColor',
                'iconLabel'     => 'MySQL/Postgres',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://www.mysql.com/fr/'
            ],
            [
                'iconUrl'       => 'fab fa-js-square fa-4x jsColor',
                'iconLabel'     => 'Javascript',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://developer.mozilla.org/fr/docs/Web/JavaScript'
            ],
            [
                'iconUrl'       => 'http://placehold.it/170X110',
                'iconLabel'     => 'Codeigniter Web Image',
                'seoFollow'     => false,
                'redirectUrl'   => '#'
            ],
            [
                'iconUrl'       => 'fa fa-wordpress fa-4x githubColor',
                'iconLabel'     => 'WordPress',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://angular.io/'
            ],
            [
                'iconUrl'       => 'fab fa-php fa-4x phpColor',
                'iconLabel'     => 'PHP',
                'seoFollow'     => true,
                'redirectUrl'   => 'http://www.php.net/'
            ],
            [
                'iconUrl'       => 'fab fa-angular fa-4x angularColor',
                'iconLabel'     => 'Angular',
                'seoFollow'     => true,
                'redirectUrl'   => 'https://angular.io/'
            ],
            [
                'iconUrl'       => 'http://placehold.it/170X110',
                'iconLabel'     => 'Assetic Web Image',
                'seoFollow'     => false,
                'redirectUrl'   => '#'
            ],
            [
                'iconUrl'       => 'http://placehold.it/170X110',
                'iconLabel'     => 'Symfony Web Image',
                'seoFollow'     => false,
                'redirectUrl'   => '#'
            ]
        ];
        
        for ($i=0; $i < count($list); $i++) 
        {
            $technology = new Technology($list[$i]);
            $manager->persist($technology);
        }
        $manager->flush();
    }
}