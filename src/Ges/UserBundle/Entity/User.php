<?php
// src/Ges/UserBundle/Entity/User.php

namespace Ges\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="enquiry_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Ges\EnquiryBundle\Entity\Enquiry", mappedBy="user_id")
     */
    protected $users;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}