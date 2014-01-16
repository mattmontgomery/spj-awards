<?php

namespace UtahSpj\AwardsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('entryPeriod')
            ->add('url')
            ->add('submitted')
            ->add('updated')
            ->add('paid')
            ->add('paidDate')
            ->add('user')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UtahSpj\AwardsBundle\Entity\Entry'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utahspj_awardsbundle_entry';
    }
}
