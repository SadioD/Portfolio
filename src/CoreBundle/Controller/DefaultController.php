<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Message;
use CoreBundle\Form\MessageType;

class DefaultController extends Controller
{
    // Page Accueil - Route: / --------------------------------------------------------------------------------- 
    public function indexAction(Request $request)
    {
        $message = new Message();
        $form  = $this->createForm(MessageType::class, $message);

        // Si le formulaire a été soumis et qu'il est valide => on traite le formulaire
        if($request->isMethod('POST')) 
        {
            if ($form->handleRequest($request)->isValid()) {
                return $this->processForm($message);
            } else {
                $this->addFlash('notice', 'Oops... Your Message could not be sent!');
            }
        }

        return $this->render('@Core/Default/index.html.twig', ['form' => $form->createView()]);
    }// -----------------------------------------------------------------------------------------------------------------------------
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Traite le formulaire de Contact -----------------------------------------------------------------------------
    public function processForm($offer) {
        // Save Form + Flash and redirect
        /*$offer->setUser($this->getDoctrine()->getManager()->find(User::class, $userId));
        $this->getDoctrine()->getManager()->persist($offer);
        $this->getDoctrine()->getManager()->flush();
        
        $this->addFlash('notice', 'The offer has been saved!');
        return $this->redirectToRoute('sadioJobsP_singlePost', ['offerSlug' => $offer->getSlug()]);*/
        return $this->redirectToRoute('core_homepage');
    }// -----------------------------------------------------------------------------------------------------------------------------
}
