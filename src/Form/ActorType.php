<?php

namespace App\Form;

use App\Entity\Actor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Actor\'s Name',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'constraints' => [
                    new Length([
                        'min' => 5,
                        'max' => 255,
                        'minMessage' => 'Min. length of this field {{ limit }}',
                        'maxMessage' => 'Max. length of this field {{ limit }}',
                    ])
                ]
            ])
            ->add('surname', TextType::class, [
                'label' => 'Actor\'s Surname',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'constraints' => [
                    new Length([
                        'min' => 5,
                        'max' => 255,
                        'minMessage' => 'Min. length of this field {{ limit }}',
                        'maxMessage' => 'Max. length of this field {{ limit }}',
                    ]),
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Performance\'s Email',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'invalid_message' => 'You entered invalid email'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Save Actor',
                'attr' => ['class' => 'form-control btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
        ]);
    }
}
