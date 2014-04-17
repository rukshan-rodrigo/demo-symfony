<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nishantha.weerakoon
 * Date: 4/06/13
 * Time: 3:56 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Ges\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegisterListener implements EventSubscriberInterface {

    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegisterSuccess',
        );
    }

    public function onRegisterSuccess(FormEvent $event)
    {
        $url = $this->router->generate('fos_user_registration_register');

        $event->setResponse(new RedirectResponse($url));
        $event->getRequest()->getSession()->getFlashBag()->add('useradded','The user was added successfully');
        $event->stopPropagation();

    }

}