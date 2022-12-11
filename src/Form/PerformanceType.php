<?php

namespace App\Form;

use App\Entity\Performance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;

class PerformanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Performance\'s Name',
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
            ->add('budget', MoneyType::class, [
                'label' => 'Performance\'s Budget',
                'invalid_message' => 'You don\'t entered right value',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Range([
                        'min' => 1000,
                        'max' => 100000,
                        'notInRangeMessage' => 'Min. value: {{ min }}. Max. value: {{ max }}'
                    ]),
                ]

            ])
            ->add('imageUrl', UrlType::class, [
                'label' => 'Image URL',
                'invalid_message' => 'You entered invalid Url',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'max' => 2000,
                        'minMessage' => 'Min. length of this field {{ limit }}',
                        'maxMessage' => 'Max. length of this field {{ limit }}',
                    ])
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Save Performance',
                'attr' => ['class' => 'form-control btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Performance::class,
        ]);
    }
}
