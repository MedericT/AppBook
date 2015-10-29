<?php

namespace AppBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBookBundle\Entity\Author;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName','text', array(
                'required' => true
            ))
            ->add('firstName', 'text', array(
                'required' => true
            ))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBookBundle\Entity\Author'
            ));
    }

    public function getName()
    {
        return 'appbookbundle_author';
    }
}
