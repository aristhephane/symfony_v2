<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckoutType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('shippingAddress')
      ->add('paymentMethod');
    // Note !!! A completer
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([]);
  }
}
