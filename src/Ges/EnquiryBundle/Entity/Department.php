<?php

namespace Ges\EnquiryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Department
 *
 * @ORM\Table(name="Department")
 * @ORM\Entity
 */
class Department
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=false, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=false, nullable=true)
     */
    protected $email;


    /**
     * @var string
     *
     * @ORM\Column(name="sequence", type="integer", unique=false, nullable=true)
     * @Assert\Min(limit="0", message="Minimum value should be 0")
     */
    protected $sequence;

    /**
     * @ORM\OneToMany(targetEntity="Enquiry", mappedBy="department_id")
     */
    protected $departments;

    /**
     * Return a friendly name for this department, used primarily in the choice list for form builder
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Department
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Department
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sequence
     *
     * @param integer $sequence
     * @return Department
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return integer
     */
    public function getSequence()
    {
        return $this->sequence;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }
    
    /**
     * Add Departments
     *
     * @param Enquiry $departments
     * @return Department
     */
    public function addDepartment(Enquiry $departments)
    {
        $this->departments[] = $departments;
    
        return $this;
    }

    /**
     * Remove Departments
     *
     * @param Enquiry $departments
     */
    public function removeDepartment(Enquiry $departments)
    {
        $this->departments->removeElement($departments);
    }

    /**
     * Get Departments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDepartments()
    {
        return $this->departments;
    }
}