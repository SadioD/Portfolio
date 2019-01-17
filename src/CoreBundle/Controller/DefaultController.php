<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Education;
use CoreBundle\Entity\Experience;
use CoreBundle\Entity\Project;
use CoreBundle\Entity\Skills;
use CoreBundle\Entity\Technology;
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
                return $this->saveForm($message, $request);
            } else {
                if ($request->getLocale() == 'en') {
                    $this->addFlash('redFlash', 'Oops... Your Message could not be sent. Please try again');
                } else {
                    $this->addFlash('redFlash', 'Oups... Votre message n\'a pas été envoyé. Merci de réessayer');
                }
            }
        }
        // On affiche la vue après avoir recupéré les entités 
        return $this->render('@Core/Default/index.html.twig', ['experienceList' => $this->getDoctrine()->getRepository(Experience::class)->findAllArray(),
                                                               'educationList'  => $this->getDoctrine()->getRepository(Education::class)->findAllArray(),
                                                               'technologies'   => $this->getDoctrine()->getRepository(Technology::class)->findAllArray(),
                                                               'projectList'    => $this->getDoctrine()->getRepository(Project::class)->findAllWithImages(),
                                                               'skillsList'     => $this->getDoctrine()->getRepository(Skills::class)->findAllWithImages(),
                                                               'form'           => $form->createView()]);
    }// -----------------------------------------------------------------------------------------------------------------------------
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Traite le formulaire de Contact -----------------------------------------------------------------------------
    // Save Form + Flash 
    public function saveForm($message, $request) {
        $this->getDoctrine()->getManager()->persist($message);
        $this->getDoctrine()->getManager()->flush();
        
        if ($request->getLocale() == 'en') {
            $this->addFlash('greenFlash', 'Your Message has been delivered.');
        } else {
            $this->addFlash('greenFlash', 'Votre message a bien été envoyé.');
        }
        return $this->redirectToRoute('core_homepage');
    }// -----------------------------------------------------------------------------------------------------------------------------
}
