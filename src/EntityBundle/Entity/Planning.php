<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Planning
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\PlanningRepository")
 */
class Planning {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", options={"default" = 0}, nullable=false)
     */
    private $state;

    /**
     * @var integer
     *
     * @ORM\Column(name="object", type="string", length=255, nullable=false)
     */
    private $object;

    /**
     * @var float
     *
     * @ORM\Column(name="tariff", type="float", nullable=false)
     */
    private $tariff;
    /**
     * @var float
     *
     * @ORM\Column(name="ca", type="float", nullable=true)
     */
    private $ca;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="text", nullable=true)
     */
    private $remarks;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="planning" )
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $categoryId;

    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="planning")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $regionId;

    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Annexe", inversedBy="planning" )
     * @ORM\JoinColumn(name="annex_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $defaultannexe;

    /**
     * @ORM\OneToMany(targetEntity="EntityBundle\Entity\Annexe", mappedBy="planning", cascade={"remove"})
     */
    private $annexe;
    /**
     * @ORM\OneToMany(targetEntity="Planninghistory", mappedBy="planning", cascade={"remove"})
     */
    private $planninghistory;

    /**
     * @ORM\OneToOne(targetEntity="EntityBundle\Entity\Deal", mappedBy="planning", cascade={"remove"})
     */
    private $deal;
    /**
     * @ORM\ManyToOne(targetEntity="\EntityBundle\Entity\User", inversedBy="planning")
     * @ORM\JoinColumn(name="agent_id", referencedColumnName="id")
     */
    private $agent;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime", nullable=false)
     */
    private $dcr;
    /**
     * Constructor
     */
    public function __construct($user=null)
    {
        $this->state = 0;
        $this->dcr = new \DateTime();
        $this->agent = $user;
        $this->annexe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->planninghistory = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set state
     *
     * @param integer $state
     * @return Planning
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set object
     *
     * @param string $object
     * @return Planning
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return string 
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set tariff
     *
     * @param float $tariff
     * @return Planning
     */
    public function setTariff($tariff)
    {
        $this->tariff = $tariff;

        return $this;
    }

    /**
     * Get tariff
     *
     * @return float 
     */
    public function getTariff()
    {
        return $this->tariff;
    }

    /**
     * Set ca
     *
     * @param float $ca
     * @return Planning
     */
    public function setCa($ca)
    {
        $this->ca = $ca;

        return $this;
    }

    /**
     * Get ca
     *
     * @return float 
     */
    public function getCa()
    {
        return $this->ca;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Planning
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Planning
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Planning
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     * @return Planning
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Planning
     */
    public function setDcr($dcr)
    {
        $this->dcr = $dcr;

        return $this;
    }

    /**
     * Get dcr
     *
     * @return \DateTime 
     */
    public function getDcr()
    {
        return $this->dcr;
    }

    /**
     * Set categoryId
     *
     * @param \EntityBundle\Entity\Category $categoryId
     * @return Planning
     */
    public function setCategoryId(\EntityBundle\Entity\Category $categoryId = null)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return \EntityBundle\Entity\Category 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set regionId
     *
     * @param \EntityBundle\Entity\Region $regionId
     * @return Planning
     */
    public function setRegionId(\EntityBundle\Entity\Region $regionId = null)
    {
        $this->regionId = $regionId;

        return $this;
    }

    /**
     * Get regionId
     *
     * @return \EntityBundle\Entity\Region 
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set defaultannexe
     *
     * @param \EntityBundle\Entity\Annexe $defaultannexe
     * @return Planning
     */
    public function setDefaultannexe(\EntityBundle\Entity\Annexe $defaultannexe = null)
    {
        $this->defaultannexe = $defaultannexe;

        return $this;
    }

    /**
     * Get defaultannexe
     *
     * @return \EntityBundle\Entity\Annexe 
     */
    public function getDefaultannexe()
    {
        return $this->defaultannexe;
    }

    /**
     * Add annexe
     *
     * @param \EntityBundle\Entity\Annexe $annexe
     * @return Planning
     */
    public function addAnnexe(\EntityBundle\Entity\Annexe $annexe)
    {
        $this->annexe[] = $annexe;

        return $this;
    }

    /**
     * Remove annexe
     *
     * @param \EntityBundle\Entity\Annexe $annexe
     */
    public function removeAnnexe(\EntityBundle\Entity\Annexe $annexe)
    {
        $this->annexe->removeElement($annexe);
    }

    /**
     * Get annexe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnexe()
    {
        return $this->annexe;
    }

    /**
     * Add planninghistory
     *
     * @param \EntityBundle\Entity\Planninghistory $planninghistory
     * @return Planning
     */
    public function addPlanninghistory(\EntityBundle\Entity\Planninghistory $planninghistory)
    {
        $this->planninghistory[] = $planninghistory;

        return $this;
    }

    /**
     * Remove planninghistory
     *
     * @param \EntityBundle\Entity\Planninghistory $planninghistory
     */
    public function removePlanninghistory(\EntityBundle\Entity\Planninghistory $planninghistory)
    {
        $this->planninghistory->removeElement($planninghistory);
    }

    /**
     * Get planninghistory
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlanninghistory()
    {
        return $this->planninghistory;
    }

    /**
     * Set deal
     *
     * @param \EntityBundle\Entity\Deal $deal
     * @return Planning
     */
    public function setDeal(\EntityBundle\Entity\Deal $deal = null)
    {
        $this->deal = $deal;

        return $this;
    }

    /**
     * Get deal
     *
     * @return \EntityBundle\Entity\Deal 
     */
    public function getDeal()
    {
        return $this->deal;
    }

    /**
     * Set agent
     *
     * @param \EntityBundle\Entity\User $agent
     * @return Planning
     */
    public function setAgent(\EntityBundle\Entity\User $agent = null)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return \EntityBundle\Entity\User 
     */
    public function getAgent()
    {
        return $this->agent;
    }
    /**
     * tostring
     */
    public function __toString() {
        return $this->getObject(). " ".$this->getStartDate()->format('d-m-Y');
    }
}
