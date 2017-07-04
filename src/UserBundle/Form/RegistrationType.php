<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationType extends EditType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // Lors de la création de la ressource, on lui donne aussi un mot de passe, choisi par le chef de projet
        $builder
            ->add('plainPassword', RepeatedType::class, array(
                'type'              => PasswordType::class,
                'first_options'     => array('label' => "Mot de passe"),
                'second_options'    => array('label' => "Confirmation du mot de passe"),
                'invalid_message'   => "Les deux champs mot de passe doivent être identiques",
                'mapped'            => false
                ))
            ;
    }
}