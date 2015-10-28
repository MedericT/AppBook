<?php

namespace AppBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBookBundle\Entity\Genre;

class GenreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /* Name */
            ->add('genre','text', array(
                'required' => true
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBookBundle\Entity\Genre'
            ));
    }

    public function getName()
    {
        return 'appbookbundle_genre';
    }
}
