<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\CategoryRepository")
 */
class Category {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Category")
     **/
    private $id;
    /**
     * @var boolean
     *
     * @ORM\Column(name="national", type="boolean")
     */
    private $national;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="category")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    private $parent;
    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent" )
     */
    private $category;
    /**
     * @ORM\OneToMany(targetEntity="Planning", mappedBy="category" )
     */
    private $planning;
    /**
     * @var string
     * @ORM\OneToMany(targetEntity="requiredInfo", mappedBy="category" ,cascade={"persist"})
     */
    private $requiredInfo;
    /**
     * @var string
     * @ORM\OneToMany(targetEntity="EntityBundle\Entity\User", mappedBy="category" )
     */
    private $user;
    /**
     * __toString()
     */
    public function __toString() {
        return $this->getName();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->national=false;
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->planning = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requiredInfo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set national
     *
     * @param boolean $national
     * @return Category
     */
    public function setNational($national)
    {
        $this->national = $national;

        return $this;
    }

    /**
     * Get national
     *
     * @return boolean 
     */
    public function getNational()
    {
        return $this->national;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Set color
     *
     * @param string $color
     * @return Category
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set parent
     *
     * @param \EntityBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\EntityBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \EntityBundle\Entity\Category
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add category
     *
     * @param \EntityBundle\Entity\Category $category
     * @return Category
     */
    public function addCategory(\EntityBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \EntityBundle\Entity\Category $category
     */
    public function removeCategory(\EntityBundle\Entity\Category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add planning
     *
     * @param \EntityBundle\Entity\Planning $planning
     * @return Category
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
     * Add requiredInfo
     *
     * @param \EntityBundle\Entity\requiredInfo $requiredInfo
     * @return Category
     */
    public function addRequiredInfo(\EntityBundle\Entity\requiredInfo $requiredInfo)
    {
        $this->requiredInfo[] = $requiredInfo;

        return $this;
    }

    /**
     * Remove requiredInfo
     *
     * @param \EntityBundle\Entity\requiredInfo $requiredInfo
     */
    public function removeRequiredInfo(\EntityBundle\Entity\requiredInfo $requiredInfo)
    {
        $this->requiredInfo->removeElement($requiredInfo);
    }

    /**
     * Get requiredInfo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRequiredInfo()
    {
        return $this->requiredInfo;
    }

    /**
     * Add user
     *
     * @param \EntityBundle\Entity\User $user
     * @return Category
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
