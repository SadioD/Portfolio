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
                return $this->processForm($message);
            } else {
                $this->addFlash('notice', 'Oops... Your Message could not be sent!');
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
    public function processForm($message) {
        // Save Form + Flash and redirect
        /*$offer->setUser($this->getDoctrine()->getManager()->find(User::class, $userId));
        $this->getDoctrine()->getManager()->persist($offer);
        $this->getDoctrine()->getManager()->flush();
        
        $this->addFlash('notice', 'The offer has been saved!');
        return $this->redirectToRoute('sadioJobsP_singlePost', ['offerSlug' => $offer->getSlug()]);*/
        return $this->redirectToRoute('core_homepage');
    }// -----------------------------------------------------------------------------------------------------------------------------
}
