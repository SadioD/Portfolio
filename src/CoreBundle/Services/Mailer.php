<?php
// Ce service permet d'envoyer des emails de notification aux personnes qui remplissent le formulaire de contact
namespace CoreBundle\Services;

class Mailer
{
    // ATTR + CONSTR -------------------------------------------------------------------------------------------
    /**
     * Contient le service SWIFT MAILER
     */
    private $mailer;
    /**
     * Contient l'email de l'expéditeur
     */
    private $adminEmail;

    public function __construct(\Swift_Mailer $mailerObject, $adminEmailAdress) {
        $this->mailer     = $mailerObject;
        $this->adminEmail = $adminEmailAdress;
    }// ---------------------------------------------------------------------------------------------------------
    // METHODS -------------------------------------------------------------------------------------------------
    public function sendNotification($email, $messageTitle, $messageContent) {
        // On définit le message (Sujet + corps)
        $message = new \Swift_Message($messageTitle);
        $message->addPart($messageContent);
        
        // On définit le destinataire et l'expéditeur
        $message->setTo($email)
                ->setFrom($this->adminEmail);

        // Enfin on envoie le message
        $this->mailer->send($message);
    }// ---------------------------------------------------------------------------------------------------------
}
