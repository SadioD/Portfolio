<?php

namespace Sadio\CoachingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoachingController extends Controller
{
    /**
     * Route : /services/coach-de-vie -------------------------------------------------------------------------------------------
     */
    public function indexAction()
    {
        return $this->render('@SadioCoaching/Coaching/index.html.twig');
    }// -------------------------------------------------------------------------------------------------------------------------
}
