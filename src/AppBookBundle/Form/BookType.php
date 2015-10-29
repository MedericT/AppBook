<?php

namespace AppBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
                'multiple' => true,
                'class' => 'AppBookBundle:Genre',
                'choice_label' => 'genre',
                'required' => false,
            ))
            ->add('authors', 'entity', array(
                'multiple' => true,
                'class' => 'AppBookBundle:Author',
                'choice_label' => 'firstLastName',
                'required' => false,
            ));

    }

    public function configureOptions(OptionsResolver $resolver)
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
