<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\RegionRepository")
 */
class Region
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
     * @ORM\Column(name="name", type="string", length=255,nullable=false)
     */
    private $name;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Planning", mappedBy="region" )
     */
    private $planning;
    /**
     * @ORM\ManyToMany(targetEntity="EntityBundle\Entity\User", mappedBy="region")
     * */
    protected $user;

    /**
     * Constructor
     */
    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->planning = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Region
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
     * Add planning
     *
     * @param \EntityBundle\Entity\Planning $planning
     * @return Region
     */
    public function addPlanning(\EntityBundle\Entity\Planning $planning)
    {
        $this->planning[] = $planning;

        return $this;
    }

    /**
     * Remove planning
     *
     * @param \EntityBundle\Entity\Planning $planning
     */
    public function removePlanning(\EntityBundle\Entity\Planning $planning)
    {
        $this->planning->removeElement($planning);
    }

    /**
     * Get planning
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlanning()
    {
        return $this->planning;
    }

    /**
     * Add user
     *
     * @param \EntityBundle\Entity\User $user
     * @return Region
     */
    public function addUser(\EntityBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \EntityBundle\Entity\User $user
     */
    public function removeUser(\EntityBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
