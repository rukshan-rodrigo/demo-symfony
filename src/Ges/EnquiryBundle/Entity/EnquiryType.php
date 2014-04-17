<?php

namespace Ges\EnquiryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EnquiryType
 *
 * @ORM\Table(name="enquiry_type")
 * @ORM\Entity
 */
class EnquiryType
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
     * @ORM\Column(name="description", type="text", unique=false, nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="sequence", type="integer", unique=false, nullable=true)
     * @Assert\Min(limit="0", message="Minimum value should be 0")
     */
    protected $sequence;

    /**
     * @ORM\OneToMany(targetEntity="Enquiry", mappedBy="enquiry_type_id")
     */
    protected $enquiry_types;

    /**
     * Return a friendly name for this Enquiry type, used primarily in the choice list for form builder
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
     * @return EnquiryType
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
     * Set description
     *
     * @param string $description
     * @return EnquiryType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sequence
     *
     * @param integer $sequence
     * @return EnquiryType
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
}