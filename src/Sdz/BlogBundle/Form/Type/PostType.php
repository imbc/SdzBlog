<?php

namespace Sdz\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder->add( 'title', 'text' );
        $builder->add( 'content', 'textarea' );
        $builder->add( 'published', 'checkbox', array(
            'required' => false,
        ));
    }

    public function setDefaultOptions( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults( array(
            'data_class' => 'Sdz\BlogBundle\Entity\Post',
        ));
    }

    public function getName()
    {
        return 'sdzblog_post';
    }
}