<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname',TextType::class, 
            ['label' => 'Nom',
            'label_attr'=>['class' => 'form-label'], 
            'attr' => ['class' => 'form-control']
            ])
            ->add('firstname',TextType::class, 
            ['label' => 'Prénom',
            'label_attr'=>['class' => 'form-label'], 
            'attr' => ['class' => 'form-control']])
            ->add('dateOfBirth',BirthdayType::class,
             ['label' => 'Date de naissance',
             'placeholder' => [
                'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
            ],
            'label_attr'=>['class' => 'form-label'], 
            ])
            ->add('phone',TextType::class, 
            ['label' => 'Téléphone',
            'label_attr'=>['class' => 'form-label'],
             'attr' => ['class' => 'form-control']] )
             ->add('email', EmailType::class,
             ['label' => 'Email',
             'label_attr'=>['class' => 'form-label'], 
             'attr' => ['class' => 'form-control']])
        
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'label' => 'Mot de passe',
                'label_attr'=>['class' => 'form-label'],
                'attr' => ['autocomplete' => 'new-password',
                            'class'=>'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        // 'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{10,}$/','Veuillez renseigner un mot de passe valide')
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])

            ->add('submit',SubmitType::class,
            [
            'label' => $options['button_label'],
            'attr' => ['class' => 'btn btn-outline-success']
            ]
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'button_label' =>'',
        ]);
    }
}
