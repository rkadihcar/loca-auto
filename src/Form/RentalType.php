<?php

namespace App\Form;

use App\Entity\Rental;
use App\Entity\User;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\User\UserInterface;

class RentalType extends AbstractType
{
    // private $userRepository;
    // public function __construct(UserRepository $userRepository)
    // {
    //     $this->userRepository = $userRepository;
    // }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    //    dd($options['user']);
        $builder
            ->add('pickUpDate',DateTimeType::class,
            ['label' => 'Date de départ',
             'placeholder' => [
                'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour']
            ])
            ->add('dropOffDate',DateTimeType::class,
            ['label_attr'=>['class' => 'form-label'],
    
            'label' => 'Date de retour',
             'placeholder' => [
                'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour']
            ])
            // ->add('users',EntityType::class,['class' => User::class,


            // 'choices' => $this->userRepository->findOneByID(),
       
            // 'choice_label' => $options['user']
            // ])
             ->add('users', TextType::class, ['attr' => ['value' => $options['user']]])
            ->add('book',SubmitType ::class,
            [
            'label' => 'Réserver',
            'attr' => ['class' => 'btn btn-outline-success']]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rental::class,
           'user' => User::class
        ]);
    }
}
