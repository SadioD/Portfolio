<?php
// src/CoreBundle/Services/EventSubscribers/LocaleSubscriber
namespace CoreBundle\Services\EventSubscribers;


use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Ce Subscriber a pour objectif de garder la même locale initiale (celle avec la quelle l'user a accéder au site)
 * quelque soit la requete => Si l'user accède au début à web/fr/ et qu'il accède ensuite à web/, 
 * la locale par défaut sera web/fr/. De même si l'user accède à web/en/ et qu'il accède ensuite à web/,
 * la locale par défaut sera web/en/
 */
class LocaleSubscriber implements EventSubscriberInterface
{
    // ATTR + CONSTR --------------------------------------------------------------------------------------------------------------------
    private $defaultLocale;

    public function __construct($defaultLocale = 'en')
    {
        $this->defaultLocale = $defaultLocale;
    }// ----------------------------------------------------------------------------------------------------------------------------------
    // METHODS -------------------------------------------------------------------------------------------------------------------------     
    /**
     * Cette méthode doit obligatoirement être implémentée (à cause de EventSubscriberInterface)
     * Elle permet de lister les évènements que ce Subscriber écoute
     */
    public static function getSubscribedEvents()
    {
        return [
            // must be registered before (i.e. with a higher priority than) the default Locale listener
            KernelEvents::REQUEST => [['onKernelRequest', 20]],
        ];
    }
    /**
     * La méthode qui sera appelée lorsque l'event kernel.request surviendra
     * ELle récupère la locale saved dans la session et linjecte dans la route courante
     * Le but c'est de garder la même _locale originelle (celle avec laquelle l'user a accédé au site) 
     * quelque soit la requete que l'user fait
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        // try to see if the locale has been set as a _locale routing parameter
        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        } else {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }// ----------------------------------------------------------------------------------------------------------------------------------
}
