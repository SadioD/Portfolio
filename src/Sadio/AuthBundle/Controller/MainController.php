<?php

namespace Sadio\AuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use CoreBundle\Entity\Message;
use CoreBundle\Form\MessageType;

class MainController extends Controller
{
    // ------------------------------------------------------------------------------------------------------------
    public function loginAction()
    {
        // Si le visiteur est déjà identifié, on le redirige vers le profile
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('sadio_auth_security_profile');
        }
        // Le service authentication_utils permet de récupérer le nom que l'utilisateur a entré dans le form
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide 
        // (mauvais mot de passe par exemple)
        $authUtils = $this->get('security.authentication_utils');
        return $this->render('@SadioAuth/Main/login.html.twig', ['error'         => $authUtils->getLastAuthenticationError(),
                                                                 'last_username' => $authUtils->getLastUsername()]);
    }// -------------------------------------------------------------------------------------------------------------------------
    /**
     * Seuls les Admin auront accès
     * @Security("has_role('ROLE_ADMIN')") --------------------------------------------------------------------------------------
     */
    public function profileAction() 
    {
        return $this->render('@SadioAuth/Main/profile.html.twig', ['messages' => $this->getDoctrine()->getRepository(Message::class)->findBy([], ['id' => 'DESC'])]);
    }// -------------------------------------------------------------------------------------------------------------------------
    /**
     * Seuls les Admin auront accès
     * @Security("has_role('ROLE_ADMIN')") --------------------------------------------------------------------------------------
     */
    public function outboxAction() 
    {
        $messageList = $this->getDoctrine()->getRepository(Message::class)->findBy(['authorEmail' => $this->container->getParameter('mailer_user')], 
                                                                                   ['id' => 'DESC']);
        return $this->render('@SadioAuth/Main/outbox.html.twig', ['messages' => $messageList]);
    }// -------------------------------------------------------------------------------------------------------------------------
    /**
     * Seuls les Admin auront accès
     * @Security("has_role('ROLE_ADMIN')") --------------------------------------------------------------------------------------
     */
    public function viewAction($id) 
    {
        $message = $this->getDoctrine()->getManager()->find(Message::class, $id);

        if (!$message) {
            throw $this->createNotFoundException('No message was found for given information - '. $id);
        }
        // On change le statut de l'ancien message
        $message->setStatus('OLD');
        $this->getDoctrine()->getManager()->flush();

        return $this->render('@SadioAuth/Main/view.html.twig', ['message' => $message]);
    }// -------------------------------------------------------------------------------------------------------------------------
    /**
     * Seuls les Admin auront accès
     * @Security("has_role('ROLE_ADMIN')") --------------------------------------------------------------------------------------
     */
    public function replyAction($id, Request $request) 
    {
        $message = $this->getDoctrine()->getManager()->find(Message::class, $id);

        if (!$message) {
            throw $this->createNotFoundException('No message was found for given information - '. $id);
        }
        
        $form  = $this->createForm(MessageType::class, $message);
        if($request->isMethod('POST')) 
        {
            // On crée la réponse
            $response = new Message();
            $response->setAuthorName($this->container->getParameter('admin_name'));
            $response->setAuthorEmail($this->container->getParameter('mailer_user'));
            $response->setReceiverEmail($message->getAuthorEmail());
            $response->setReceiverName($message->getAuthorName());
            $response->setSubject($request->request->get('subject'));
            $response->setContent($request->request->get('content'));

            // On save le tout en BDD
            $this->getDoctrine()->getManager()->persist($response);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('greenFlash', 'Youpi... your message has been sent');
            return $this->redirectToRoute('sadio_auth_security_outbox');                        
        }

        return $this->render('@SadioAuth/Main/reply.html.twig', ['message' => $message,
                                                                 'form'    => $form->createView()]);
    }// -------------------------------------------------------------------------------------------------------------------------
    /**
     * Seuls les Admin auront accès
     * @Security("has_role('ROLE_ADMIN')") --------------------------------------------------------------------------------------
     */
    public function deleteAction($id) 
    {
        $message = $this->getDoctrine()->getManager()->find(Message::class, $id);

        if (!$message) {
            throw $this->createNotFoundException('No message was found for given information - '. $id);
        }
        // On recupère la route de ridrection
        $route =  $message->getAuthorEmail() == $this->container->getParameter('mailer_user') ? 'sadio_auth_security_outbox' : 'sadio_auth_security_profile';

        // On supprime le message et on redirige
        $this->getDoctrine()->getManager()->remove($message);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute($route);

    }// -------------------------------------------------------------------------------------------------------------------------
}
