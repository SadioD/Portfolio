<?php
// Ce Service est un callBack qui sera appelé après chaque persist d'une entité (Message)
// Sa méthode postPersist() sera exécutée à chaque PostPersist Event
// Celle-ci appellera les méthodes d'autres Services [sendNotification() pour Mailer, purgeMessageList() pour Purge, etc.]
namespace CoreBundle\Services\EventListeners\DoctrineListeners;

use CoreBundle\Entity\Message;
use CoreBundle\Services\Purge;
use CoreBundle\Services\Mailer;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class EntityCreationListener 
{
    // ATTR + CONSTR -------------------------------------------------------------------------------------------------
    /**
     * Service CoreBundle\Services\Mailer
     */
    private $mailer;

    /**
     * Service CoreBundle\Services\Purge
     */
    private $purgator;

    public function __construct(Mailer $mailerObject, Purge $purgatorObject) {
        $this->mailer   = $mailerObject;
        $this->purgator = $purgatorObject;
    }// ------------------------------------------------------------------------------------------------------------------------
    // METHODS -------------------------------------------------------------------------------------------------
    public function postPersist(LifecycleEventArgs $arg) {
        // On recupère l'entité instanciée
        $entity = $arg->getObject();

        // Si c'est un entité de Message qui a été persisté =>
        // On envoie l'email de confirmation de réception du message et on purge la liste des vieux messages
        if (!$entity instanceof Message) 
        { 
            return; 
        }
        $recepientEmail  = $entity->getAuthorEmail();
        $recepientName   = $entity->getAuthorName();
        
        // Si $authorName = $recepientName == Sadio DIALLO => Il s'agit d'une réponse à un email recu
        // Sinon => Il s'agit d'un envoi d'accusé de réception (=> on le définit dans le ELSE)
        if ($recepientEmail == $this->mailer->getAdminEmail()) {
            $messageTitle    = $entity->getSubject();
            $messageContent  = $entity->getContent();
        } else {
            $messageTitle    = 'AutoReply - Confirmation de réception';
            $messageContent  = '<p>Bonjour ' . $entity->getAuthorName() . ', <br/><br/>';
            $messageContent .= 'Je vous confirme avoir bien reçu votre message. <br/><br/>';
            $messageContent .= 'Je vous ferai un retour dès que possible. <br/><br/> Cordialement. <br/><br/> Sadio DIALLO.</p>';
        }

        
            
        $this->mailer->sendNotification($recepientEmail, $recepientName, $messageTitle, $messageContent);
        $this->purgator->purgeMessageList($arg);
    }// ------------------------------------------------------------------------------------------------------------------------
}