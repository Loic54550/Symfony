<?php
// src/Form/UtilisateurInscriptionType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Utilisateur;

class UtilisateurInscriptionType extends AbstractType
{
    // function pour donner au formulaire le type de l'entité qu'il gère (ainsi il "comprend" qu'il doit bosser avec un User::class)
    public function configureOtions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Utilisateur::class,
        ));
    }

    // function pour générer le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail', EmailType::class, ['attr' => ['placeholder' => 'ex: lolo@gmail.com']])
            ->add('password', PasswordType::class)
            ->add('pseudo')
            ->add('inscription', SubmitType::class)
        ;
    }
}