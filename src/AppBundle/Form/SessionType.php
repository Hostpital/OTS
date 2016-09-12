<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sessionName')
            ->add('sessionStart', 'datetime')
            ->add('sessionEnd', 'datetime')
            ->add('specialist', 'entity', [
                'class' => 'AppBundle:Specialist',
                'property'=>'name'
            ])
            ->add('patient', 'entity', [
                'class' => 'AppBundle:Patient',
                'property'=>'name'
            ])
            ->add('anesthetists', 'entity', [
                'class' => 'AppBundle:Anesthetist',
                'property'=>'name',
                'multiple' => true
            ])
            ->add('operatingRooms', 'entity', [
                'class' => 'AppBundle:OperatingRoom',
                'property'=>'ot_name',
                'multiple' => true
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Session'
        ));
    }
}
