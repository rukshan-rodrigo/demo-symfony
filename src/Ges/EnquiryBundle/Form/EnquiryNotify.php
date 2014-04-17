<?php

namespace Ges\EnquiryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Doctrine\ORM\EntityRepository;

class EnquiryNotify extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $validEmailConstrain = new Email();
        $builder
            ->add(
                'notify_to',
                'choice',
                array(
                    'choices' => array('0' => 'department', '1' => 'Individual'),
                    'required' => true,
                    'multiple' => false,
                    'expanded' => true,
                    'data' => 0,
                )
            )
            ->add('department', 'entity', array(
                'class' => 'GesEnquiryBundle:Department',


            ))
            ->add(
                'notify_email',
                'email',
                array(
                    'constraints' => array($validEmailConstrain),
                    'required' => false,
                )
            )
            ->add(
                'notify_text',
                'textarea',
                array(
                    'required' => false,
                )

            );
    }
    public function getName()
    {

    }
}