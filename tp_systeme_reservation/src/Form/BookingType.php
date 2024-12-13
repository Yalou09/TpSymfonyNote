<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'border rounded p-2 w-full'], // Classes Tailwind
            ])
            ->add('timeSlot', DateTimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'border rounded p-2 w-full'], // Classes Tailwind
            ])
            ->add('eventName', TextType::class, [
                'attr' => ['class' => 'border rounded p-2 w-full'], // Classes Tailwind
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name', // or 'name' if you want to use the name property
                'attr' => ['class' => 'border rounded p-2 w-full'], // Classes Tailwind
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
