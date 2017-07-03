<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array(
                'label' => "Nom d'utilisateur"
                ))
            ->add('firstName', null, array(
                'label' => "Prénom"
                ))
            ->add('lastName', null, array(
                'label' => "Nom"
                ))
            ->add('email', EmailType::class, array(
                'label' => "Adresse mail"
                ))
            ->add('plainPassword', RepeatedType::class, array(
                'type'              => PasswordType::class,
                'first_options'     => array('label' => "Mot de passe"),
                'second_options'    => array('label' => "Confirmation du mot de passe"),
                'invalid_message'   => "Les deux champs mot de passe doivent être identiques"
                ))
            ;
    }
}