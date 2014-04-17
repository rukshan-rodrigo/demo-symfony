<?php

namespace Ges\EnquiryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Enquiry
 *
 * @ORM\Table(name="enquiry")
 * @ORM\Entity(repositoryClass="Ges\EnquiryBundle\Entity\EnquiryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Enquiry
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
     * @ORM\Column(name="family_name", type="string", length=255, unique=false, nullable=false)
     */
    protected $family_name;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, unique=false, nullable=false)
     */
    protected $first_name;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", unique=false, nullable=false)
     * @Assert\Range(
     * min = "1",
     * max = "200",
     * minMessage = "Please enter valid value for age",
     * maxMessage = "Please enter valid value for age",
     * invalidMessage = "Please enter valid value for age"
     * )
     */
    protected $age;

    /**
     * @var string
     *
     * @ORM\Column(name="file_number", type="string", length=255, unique=false, nullable=false)
     */
    protected $file_number;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10, unique=false, nullable=false)
     */
    protected $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=false, nullable=false)
     */
    protected $email;


    /**
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="departments")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id" , onDelete="SET NULL")
     */
    protected $department_id;

    /**
     * @ORM\ManyToOne(targetEntity="EnquiryType", inversedBy="enquiry_types")
     * @ORM\JoinColumn(name="enquiry_type_id", referencedColumnName="id" , onDelete="SET NULL")
     */
    protected $enquiry_type_id;

    /**
     * @ORM\ManyToOne(targetEntity="EnquiryLevel", inversedBy="enquiry_levels")
     * @ORM\JoinColumn(name="enquiry_level_id", referencedColumnName="id" , onDelete="SET NULL")
     */
    protected $enquiry_level_id;

    /**
     * @ORM\ManyToOne(targetEntity="Ges\UserBundle\Entity\User", inversedBy="users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id; //record reported user's ID

    /**
     * @var datetime
     *
     * @ORM\Column(name="enquiry_date", type="datetime")
     */
    protected $enquiry_date;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, unique=false, nullable=false )
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, unique=false, nullable=false )
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255, unique=false, nullable=false )
     */
    protected $place;


    /**
     * @var string
     *
     * @ORM\Column(name="report_by", type="string", length=255, unique=false, nullable=false )
     */
    protected $report_by;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", unique=false, nullable=false )
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="manager_comments", type="text", unique=false, nullable=true )
     */
    protected $manager_comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_approved", type="integer", unique=false, nullable=true )
     */
    protected $is_approved;


    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime" )
     */
    protected $modified_at;


    /**
     * Before we persist or update call the updatedTimestamps() function.
     *
     * @ORM\prePersist
     * @ORM\preUpdate
     */
    public function updatedTimestamps()
    {
        $this->setModifiedAt(new \DateTime(date('Y-m-d H:i:s')));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
        }
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
     * Set family_name
     *
     * @param string $familyName
     * @return Enquiry
     */
    public function setFamilyName($familyName)
    {
        $this->family_name = $familyName;

        return $this;
    }

    /**
     * Get family_name
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->family_name;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return Enquiry
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Enquiry
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set file_number
     *
     * @param string $fileNumber
     * @return Enquiry
     */
    public function setFileNumber($fileNumber)
    {
        $this->file_number = $fileNumber;

        return $this;
    }

    /**
     * Get file_number
     *
     * @return string
     */
    public function getFileNumber()
    {
        return $this->file_number;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Enquiry
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Enquiry
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get leader_email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set enquiry_date
     *
     * @param \DateTime $enquiryDate
     * @return Enquiry
     */
    public function setEnquiryDate($enquiryDate)
    {
        $this->enquiry_date = $enquiryDate;

        return $this;
    }

    /**
     * Get enquiry_date
     *
     * @return \DateTime
     */
    public function getEnquiryDate()
    {
        return $this->enquiry_date;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Enquiry
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Enquiry
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set place
     *
     * @param string $place
     * @return Enquiry
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set report_by
     *
     * @param string $reportBy
     * @return Enquiry
     */
    public function setReportBy($reportBy)
    {
        $this->report_by = $reportBy;

        return $this;
    }

    /**
     * Get report_by
     *
     * @return string
     */
    public function getReportBy()
    {
        return $this->report_by;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Enquiry
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
     * Set manager_comments
     *
     * @param string $managerComments
     * @return Enquiry
     */
    public function setManagerComments($managerComments)
    {
        $this->manager_comments = $managerComments;

        return $this;
    }

    /**
     * Get manager_comments
     *
     * @return string
     */
    public function getManagerComments()
    {
        return $this->manager_comments;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Enquiry
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set modified_at
     *
     * @param \DateTime $modifiedAt
     * @return Enquiry
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modified_at = $modifiedAt;

        return $this;
    }

    /**
     * Get modified_at
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modified_at;
    }

    /**
     * Set department_id
     *
     * @param \Ges\EnquiryBundle\Entity\Department $departmentId
     * @return Enquiry
     */
    public function setDepartmentId(\Ges\EnquiryBundle\Entity\Department $departmentId = null)
    {
        $this->department_id = $departmentId;

        return $this;
    }

    /**
     * Get department_id
     *
     * @return \Ges\EnquiryBundle\Entity\Department
     */
    public function getDepartmentId()
    {
        return $this->department_id;
    }

    /**
     * Set enquiry_type_id
     *
     * @param \Ges\EnquiryBundle\Entity\EnquiryType $enquiryTypeId
     * @return Enquiry
     */
    public function setEnquiryTypeId(\Ges\EnquiryBundle\Entity\EnquiryType $enquiryTypeId = null)
    {
        $this->enquiry_type_id = $enquiryTypeId;

        return $this;
    }

    /**
     * Get enquiry_type_id
     *
     * @return \Ges\EnquiryBundle\Entity\EnquiryType
     */
    public function getEnquiryTypeId()
    {
        return $this->enquiry_type_id;
    }

    /**
     * Set enquiry_level_id
     *
     * @param \Ges\EnquiryBundle\Entity\EnquiryLevel $enquiryLevelId
     * @return Enquiry
     */
    public function setEnquiryLevelId(\Ges\EnquiryBundle\Entity\EnquiryLevel $enquiryLevelId = null)
    {
        $this->enquiry_level_id = $enquiryLevelId;

        return $this;
    }

    /**
     * Get enquiry_level_id
     *
     * @return \Ges\EnquiryBundle\Entity\EnquiryLevel
     */
    public function getEnquiryLevelId()
    {
        return $this->enquiry_level_id;
    }


    /**
     * Set is_approved
     *
     * @param integer $isApproved
     * @return Enquiry
     */
    public function setIsApproved($isApproved)
    {
        $this->is_approved = $isApproved;

        return $this;
    }

    /**
     * Get is_approved
     *
     * @return integer
     */
    public function getIsApproved()
    {
        return $this->is_approved;
    }

    /**
     * Set user_id
     *
     * @param \Ges\UserBundle\Entity\User $userId
     * @return Enquiry
     */
    public function setUserId(\Ges\UserBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return \Ges\UserBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}