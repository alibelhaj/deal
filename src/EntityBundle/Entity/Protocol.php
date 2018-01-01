<?php

namespace EntityBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Protocol
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\ProtocolRepository")
 */
class Protocol {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datep", type="datetime")
     * @Assert\Date(message="La date de naissance n'est pas valide")
     */
    private $datep;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="Annexe", mappedBy="protocol", cascade={"remove"})
     */
    protected $annexe;

    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\User", inversedBy="protocol")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $user;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Entreprise", inversedBy="protocol")
     * @ORM\JoinColumn(name="entreprise_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $entreprise;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\User", inversedBy="protocol")
     * @ORM\JoinColumn(name="commercial_id", referencedColumnName="id",onDelete="CASCADE")
     */
    protected $commercial;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set datep
     *
     * @param \DateTime $datep
     * @return Protocol
     */
    public function setDatep($datep) {
        $this->datep = $datep;

        return $this;
    }

    /**
     * Get datep
     *
     * @return \DateTime 
     */
    public function getDatep() {
        return $this->datep;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Protocol
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->datep = new \DateTime();
        $this->annexe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->status = true;
    }

    /**
     * Add annexe
     *
     * @param \EntityBundle\Entity\Annexe $annexe
     * @return Protocol
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
     * Set user
     *
     * @param \EntityBundle\Entity\User $user
     * @return Protocol
     */
    public function setUser(\EntityBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \EntityBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    public function __toString() {
        return $this->getUser()->getName();
    }

    /**
     * Set commercial
     *
     * @param \EntityBundle\Entity\User $commercial
     * @return Protocol
     */
    public function setCommercial(\EntityBundle\Entity\User $commercial = null)
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * Get commercial
     *
     * @return \EntityBundle\Entity\User 
     */
    public function getCommercial()
    {
        return $this->commercial;
    }

    /**
     * Set entreprise
     *
     * @param \EntityBundle\Entity\Entreprise $entreprise
     * @return Protocol
     */
    public function setEntreprise(\EntityBundle\Entity\Entreprise $entreprise = null)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return \EntityBundle\Entity\Entreprise 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }
}
