<?php

namespace App\Form;

use App\Entity\DVD;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DVDType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('title', TextType::class)
      ->add('description', TextType::class)
      ->add('releaseYear')
      ->add('runtime')
      ->add('director')
      ->add('studio')
      ->add('genres')
      ->add('actors');
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => DVD::class,
    ]);
  }
}
