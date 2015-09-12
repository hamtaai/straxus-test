<?php

namespace AppBundle\Listener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener;

class FormAuthenticationListener extends UsernamePasswordFormAuthenticationListener
{
    protected function attemptAuthentication(Request $request)
    {       
        // check for a valid captcha here
        // I am using the GregwarCaptchaBundle
        // only shown when throttling in my case
        $captcha = $request->request->get('login[recaptcha]', null, true);
        if (null !== $captcha) {
            $check = $request->getSession()->get('gcb_recaptcha');
            if ($captcha !== $check['phrase']) {
                throw new BadCredentialsException('Captcha is invalid');
            }
        }

        return parent::attemptAuthentication($request);
    }
}