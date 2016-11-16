<?php

namespace WS\apiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, array(
                'choices'  => array(
                    'Mlle' => 'miss',
                    'Mme' => 'madam',
                    'M.' => 'mister',
                ),
                'expanded' => true,
            ))
            ->add('name')
            ->add('firstname')
            ->add('postalcode')
            ->add('mail')
            ->add('phone')
            ->add('actuality',ChoiceType::class, array(
                'choices'  => array(
                    'oui' => 1,
                    'non' => 0,
                ),
                'expanded' => true,
            ))
            ->add('offer',ChoiceType::class, array(
                'choices'  => array(
                    'oui' => 1,
                    'non' => 0,
                ),
                'expanded' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WS\apiBundle\Entity\User'
        ));
    }
}
