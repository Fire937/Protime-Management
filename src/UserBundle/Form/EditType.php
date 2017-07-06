<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;

class EditType extends AbstractType
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
            ->add('role', ChoiceType::class, array(
                'choices' => array(
                    'Chef de Projet' => 'ROLE_CP', // Les resources peuvent être promues au range de Chef de Projet, dans ce cas il est possible de voir des Chef de Projet qui soient Directeur de Projet, on peut voir ça comme une phase de transition, en attendant que le projet soit fini et que le nouveau Chef de Projet créé un projet.
                    'Directeur de Projet' => 'ROLE_DP',
                    'Développeur' => 'ROLE_DEV',
                    )
                ))
            ;
    }
}