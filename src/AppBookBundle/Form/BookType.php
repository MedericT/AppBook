<?php

namespace AppBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBookBundle\Entity\Book;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text', array(
                'empty_data'   => '- Saisir le titre du livre -',
                'required' => true
            ))
            ->add('genres', 'entity', array(
                'class' => 'AppBookBundle:Genre',
                'property' => 'genre',
                'multiple' => true,
                'required' => false,
            ));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBookBundle\Entity\Book'
            ));
    }

    public function getName()
    {
        return 'appbookbundle_book';
    }
}
