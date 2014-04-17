<?php

namespace Ges\EnquiryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;

class DepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $validEmailConstrain = new Email();
        $builder
            ->add('name')
            ->add(
                'email',
                'email',
                array(
                    'constraints' => array($validEmailConstrain),
                    'required' => true,
                )
            )
            ->add('sequence')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ges\EnquiryBundle\Entity\Department'
        ));
    }

    public function getName()
    {
        return 'ges_enquirybundle_department_type';
    }
}
