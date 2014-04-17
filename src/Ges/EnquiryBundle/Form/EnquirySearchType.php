<?php

namespace Ges\EnquiryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EnquirySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        /// remove above no need to add
        $builder->add(
            'family_name',
            'text',
            array(
                'required' => false
            )
        );
        $builder->add(
            'first_name',
            'text',
            array(
                'required' => false
            )
        );
        $builder->add(
            'file_name',
            'text',
            array(
                'required' => false
            )
        );
        $builder->add(
            'country',
            'country',
            array(
                'required' => false,
                'empty_value' => 'Select country'
            )
        );
        $builder->add(
            'date_from',
            'date',
            array(
                'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                'required' => false,
            )
        );
        $builder->add(
            'date_to',
            'date',
            array(
                'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                'required' => false,
            )
        );
        $builder->add(
            'department',
            'entity',
            array(
                'class' => 'GesEnquiryBundle:Department',
                'empty_value' => 'Choose a department',
                'required' => false,
            )
        );
        $builder->add(
            'enquiry_type',
            'entity',
            array(
                'class' => 'GesEnquiryBundle:EnquiryType',
                'empty_value' => 'Choose an Enquiry type',
                'required' => false,
            )
        );
        $builder->add(
            'enquiry_level',
            'entity',
            array(
                'class' => 'GesEnquiryBundle:EnquiryLevel',
                'empty_value' => 'Choose an Enquiry level',
                'required' => false,
            )
        );
        $builder->add(
            'is_approved',
            'choice',
            array(
                'choices' => array('0' => 'Pending', '1' => 'Approved'),
                'empty_value' => 'Choose a status',
                'required' => false,
                'multiple' => false,
            )
        );

    }


    public function getName()
    {
        return 'ges_enquirybundle_enquiry_search';
    }
}
