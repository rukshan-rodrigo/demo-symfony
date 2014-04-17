<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nishantha.weerakoon
 * Date: 4/06/13
 * Time: 2:54 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Ges\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    //private $roles_hierarchy;

    public function __construct($class, $roles_hierarchy = null)
    {
        parent::__construct($class);
        $this->roles_hierarchy = $roles_hierarchy;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $roles = array();
        $rolesAdded = array();

        // Add herited roles
        foreach ($this->roles_hierarchy as $roleParent => $rolesHerit) {
            $tmpRoles = array_values($rolesHerit);
            $rolesAdded = array_merge($rolesAdded, $tmpRoles);
            $roles[$roleParent] = array_combine($tmpRoles, $tmpRoles);
        }
        // Add missing superparent roles
        $rolesParent = array_keys($this->roles_hierarchy);
        foreach ($rolesParent as $roleParent) {
            if (!in_array($roleParent, $rolesAdded)) {
                $roles['-----'][$roleParent] = $roleParent;
            }
        }

        // add your custom field
        $builder->add('roles', 'collection', array(
            'type'   => 'choice',
            'options'  => array(
                'label' => ' ',
                'choices'  => $roles,
            ),
        ));
    }

    public function getName()
    {
        return 'fos_user_registration';
    }
}