<?php
// src/Form/MessageType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MessageType extends AbstractType
{
    // function pour donner au formulaire le type de l'entité qu'il gère (ainsi il "comprend" qu'il doit bosser avec un User::class)
    public function configureOtions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

    // function pour générer le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Pseudo')
            ->add('mail')
            ->add('password')
            ->add('save', SubmitType::class)
        ;
    }
}