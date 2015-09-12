<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

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

        $builder->add('login', 'submit', array(
            'label' => "Login"
        ));
        
        $builder->add('recaptcha', 'ewz_recaptcha', array(
            'label' => false,
            'mapped' => false,
            'constraints'   => array(
                new IsTrue()
            ),
            'error_bubbling' => true
        ));
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'intention' => 'authenticate'
            )
        );
    }
}