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
        $email          = $entity->getAuthorEmail();
        $messageTitle   = 'Sadio DIALLO - Confirmation de réception';
        $messageContent = 'Bonjour ' . $entity->getAuthorName() . ', <br/>';
        $messageContent .= 'Je vous confirme avoir bien reçu votre message. <br/>';
        $messageContent .= 'Je vous ferai un retour dès que possible. <br/> Cordialement. <br/><br/> Sadio DIALLO.';
            
        $this->mailer->sendNotification($email, $messageTitle, $messageContent);
        $this->purgator->purgeMessageList($arg);
    }// ------------------------------------------------------------------------------------------------------------------------
}