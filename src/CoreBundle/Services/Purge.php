<?php
// Ce Service Purge les vieux messages lus qui datent de plus de 60 jours.
namespace CoreBundle\Services;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class Purge
{
    // ATTR + CONSTR -------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------------------------
    // METHODS -------------------------------------------------------------------------------------------------
    public function purgeMessageList(LifecycleEventArgs $arg) 
    {
        // On recupère l'entity manager
        // Et la liste des messages pour vérifier s'il faut les supprimer
        $em = $arg->getObjectManager();
        $messageList = $em->getRepository(Message::class)->findAll();

        // Si la BDD ne contient aucun Message, on ne fait rien
        if (!$messageList) {
            return;
        }
        // Si Oui, pour chaque message, on calcule la date de référence pour la comparer à celle d'aujourd'hui
        foreach ($messageList as $message) 
        {
            $todaysDate    = new \DateTime();
            $referenceDate = new \DateTime($message->getCreationDate()->format('Y-m-d H:i:s'));
            $referenceDate->modify('+1 day');
            
            // Ensuite supprime les messages qui ont été lus et qui sont vieux de plus  de 60 jours 
            // Mais avant on leur envoie un email d'information
            if ($message->getStatus() == 'OLD' && $todaysDate->format('Y-m-d') >= $referenceDate->format('Y-m-d')) 
            {
                $em->remove($message);
            }
        }
        $em->flush();
    }// ------------------------------------------------------------------------------------------------------------------------
}