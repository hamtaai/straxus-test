<?php
namespace AppBundle\Listener;

use Symfony\Component\Security\Core\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Doctrine\ORM\EntityManager;
 
class AuthenticationListener
{
        protected $em;
        
        public function __construct(\Doctrine\ORM\EntityManager $em) {
            $this->em = $em;
        }
    
	/**
	 * onAuthenticationFailure
	 *
	 * @param 	AuthenticationFailureEvent $event
	 */
	public function onAuthenticationFailure( AuthenticationFailureEvent $event )
	{
            $token = $event->getAuthenticationToken();
            $userName = $token->getUsername();
            
            $user = $this->em->getRepository('AppBundle:users')->findOneBy(array('username' => $userName));
               
            if($user) {
                $user->setLoginAttempts($user->getLoginAttempts()+1);

                $this->em->persist($user);
                $this->em->flush();
            }
            
            
	}
 
	/**
	 * onAuthenticationSuccess
	 *
	 * @param 	InteractiveLoginEvent $event
	 */
	public function onAuthenticationSuccess( InteractiveLoginEvent $event )
    {
            $token = $event->getAuthenticationToken();
            $userName = $token->getUsername();
            
            $user = $this->em->getRepository('AppBundle:users')->findOneBy(array('username' => $userName));
               
            if($user) {
                $user->setLoginAttempts(0);

                $this->em->persist($user);
                $this->em->flush();
            }
    }
}