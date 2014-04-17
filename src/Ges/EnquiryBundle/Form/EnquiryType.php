<?php

namespace Ges\EnquiryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Doctrine\ORM\EntityRepository;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $validEmailConstrain = new Email();
        $builder
            ->add('family_name')
            ->add('first_name')
            ->add('age')
            ->add('file_number')
            ->add(
                'gender',
                'choice',
                array(
                    'choices' => array('Male' => 'Male', 'Female' => 'Female'),
                    'required' => true,
                    'multiple' => false,
                    'expanded' => true,
                )
            )
            ->add(
                'email',
                'email',
                array(
                    'constraints' => array($validEmailConstrain),
                    'required' => true,
                )
            )
            ->add('enquiry_date')
            ->add('country','country')
            ->add('city')
            ->add('place')
            ->add('report_by')
            ->add('description')
            ->add('manager_comments')
            ->add(
                'department_id',
                null,
                array(
                    'required' => true,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('b')
                            ->orderBy('b.sequence', 'ASC');
                    },
                    'empty_value' => 'Choose a department',
                )
            )
            ->add('enquiry_type_id',
                null,
                array(
                    'required' => true,
                    'empty_value' => 'Choose an Enquiry Type',
                )
            )
            ->add('enquiry_level_id',
                null,
                array(
                    'required' => true,
                    'empty_value' => 'Choose an Enquiry Level',
                )
            )
            ->add(
                'is_approved',
                'choice',
                array(
                    'choices' => array('0' => 'Pending', '1' => 'Approved'),
                    'required' => true,
                    'multiple' => false,
                )
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Ges\EnquiryBundle\Entity\Enquiry'
            )
        );
    }

    public function getName()
    {
        return 'ges_enquirybundle_enquirytype';
    }
}
