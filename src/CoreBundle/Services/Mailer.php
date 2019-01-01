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
     * Contient l'email de l'expéditeur (ADMIN)
     */
    private $adminEmail;
    /**
     * Contient le nom de l'expéditeur (ADMIN)
     */
    private $adminName;

    public function __construct(\Swift_Mailer $mailerObject, $adminEmailAdress, $adminName) {
        $this->mailer     = $mailerObject;
        $this->adminEmail = $adminEmailAdress;
        $this->adminName  = $adminName;
    }// ---------------------------------------------------------------------------------------------------------
    // GETTERS -------------------------------------------------------------------------------------------------
    public function getAdminEmail() {
        return $this->adminEmail;
    }// ---------------------------------------------------------------------------------------------------------
    // OTHERS -------------------------------------------------------------------------------------------------
    public function sendNotification($recepientEmail, $recepientName, $messageTitle, $messageContent) {
        // On définit le message (Sujet + corps)
        $message = new \Swift_Message($messageTitle);
        $message->addPart($messageContent, 'text/html');
        //$message->setBody($messageContent, 'text/html');
        
        // On définit le destinataire et l'expéditeur
        $message->setTo([$recepientEmail     => $recepientName])
                ->setFrom([$this->adminEmail => $this->adminName]);

        // Enfin on envoie le message
        $this->mailer->send($message);
    }// ---------------------------------------------------------------------------------------------------------
}
