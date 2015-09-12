<?php

namespace AppBundle\Form;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\IsTrue as RecaptchaIsTrue;

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

        $builder->add('username', 'text', array(
            'label' => false,
            'attr' => array(
                'placeholder' => 'Enter username',
        )));

        $builder->add('password', 'password', array(
            'label' => false,
            'attr' => array(
                'placeholder' => 'Enter password',
        )));

        $builder->add('target_path', 'hidden', array(
            'label' => false,
            'attr' => array(
                'value' => "/"
            )
        ));

        $builder->add('recaptcha', 'ewz_recaptcha', array(
            'label' => false,
            'mapped' => false,
            'constraints' => array(
                new RecaptchaIsTrue()
            ),
            'error_bubbling' => true
        ));

        $builder->add('login', 'submit', array(
            'label' => "Login",
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $collectionConstraint = new Collection(array(
            'recaptcha' => new RecaptchaIsTrue(),
        ));

        $resolver->setDefaults(array(
            'intention' => 'authenticate',
            'validation_constraint' => $collectionConstraint
                )
        );
    }

}
