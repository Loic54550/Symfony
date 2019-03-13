<?php
// src/Form/MessageType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\Message;


class MessageType extends AbstractType
{
    // function pour donner au formulaire le type de l'entité qu'il gère (ainsi il "comprend" qu'il doit bosser avec un User::class)
    public function configureOtions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Message::class,
        ));
    }

    // function pour générer les messages
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('content', TextType::class)
            ->add('Envoyer', SubmitType::class)
        ;
    }
}