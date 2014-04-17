<?php

namespace Ges\EnquiryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * EnquiryLevel
 *
 * @ORM\Table(name="enquiry_level")
 * @ORM\Entity
 */
class EnquiryLevel
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
     *
     * @ORM\OneToMany(targetEntity="Enquiry", mappedBy="enquiry_level_id")
     * @ORM\OrderBy({"sequence" = "ASC"})
     */
    protected $enquiry_levels;

    /**
     * Return a friendly name for this level, used primarily in the choice list for form builder
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
     * @return EnquiryLevel
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
     * @return EnquiryLevel
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
     * @return EnquiryLevel
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
        $this->enquiry_levels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add enquiry_levels
     *
     * @param \Ges\EnquiryBundle\Entity\Enquiry $enquiryLevels
     * @return EnquiryLevel
     */
    public function addEnquiryLevel(\Ges\EnquiryBundle\Entity\Enquiry $enquiryLevels)
    {
        $this->enquiry_levels[] = $enquiryLevels;

        return $this;
    }

    /**
     * Remove enquiry_levels
     *
     * @param \Ges\EnquiryBundle\Entity\Enquiry $enquiryLevels
     */
    public function removeEnquiryLevel(\Ges\EnquiryBundle\Entity\Enquiry $enquiryLevels)
    {
        $this->enquiry_levels->removeElement($enquiryLevels);
    }

    /**
     * Get enquiry_levels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnquiryLevels()
    {
        return $this->enquiry_levels;
    }
}