<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\ActorPerformance;
use App\Entity\Performance;
use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActorPerformanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('actor', EntityType::class, [
                'label' => 'Select Actor',
                'attr' => ['class' => 'form-control'],
                'class' => Actor::class,
            ])
            ->add('performance', EntityType::class, [
                'label' => 'Select Performance',
                'attr' => ['class' => 'form-control'],
                'class' => Performance::class,
                'choice_value' => 'id',
                'choice_label' => 'name'
            ])
            ->add('role', EntityType::class, [
                'label' => 'Select Actor Role',
                'attr' => ['class' => 'form-control'],
                'class' => Role::class,
                'choice_value' => 'id',
                'choice_label' => 'name',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Save',
                'attr' => ['class' => 'form-control btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ActorPerformance::class,
        ]);
    }
}
