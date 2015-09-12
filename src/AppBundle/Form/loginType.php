<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class loginType extends AbstractType {

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getName() {
        return 'login';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setMethod('POST');
        $builder->setAttribute('role', 'form');

        $builder->add('username', 'text', array(
            'label' => false,
            'attr' => array(
                'placeholder' => 'Enter username',
                'class' => 'form-control'
        )));

        $builder->add('password', 'password', array(
            'label' => false,
            'attr' => array(
                'placeholder' => 'Enter password',
                'class' => 'form-control'
        )));

        $builder->add('target_path', 'hidden', array(
            'label' => false,
            'attr' => array(
                'value' => "/"
            )
        ));

        $builder->add('recaptcha', 'captcha', array(
            'label' => false,
            'width' => 270,
            'height' => 60,
            'length' => 5
        ));

        $builder->add('login', 'submit', array(
            'label' => "Login",
            'attr' => array(
                'class' => 'btn btn-default'
            )
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'intention' => 'authenticate',
                )
        );
    }

}
