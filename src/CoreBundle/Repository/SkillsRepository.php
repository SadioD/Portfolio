<?php

namespace CoreBundle\Repository;

/**
 * SkillsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SkillsRepository extends \Doctrine\ORM\EntityRepository
{
    // Permet de récupérer les Skills avec leurs Images correspondantes => quand on fait skills.getImage dans TWIG, 
    // Pas de requetes SQL supplémentaire déclenchée
    public function findAllWithImages() 
    {
        // "s" represente l'alias de Skills et "i" celui de Image
        $qb = $this->createQueryBuilder('s');

        $qb->innerJoin('s.image', 'i')
           ->addSelect('i')
           ->orderBy('s.id', 'ASC');
        
        // On recupère les résultats au format Array pour optimiser le temps de traitement. 
        // On peut se le permettre vu que nous n'aurons pas besoin de faire $skills->setAttr() une fois les Skills recupérés de la BDD
        return $qb->getQuery()->getArrayResult();
    }
}