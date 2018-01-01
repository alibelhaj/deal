<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\CommandRepository")
 */
class Command
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
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dpa", type="datetime",nullable=true)
     */
    private $dpa;
    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer")
     */
    private $qte;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\User", inversedBy="command")
     * @ORM\JoinColumn(name="vs_user_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="Caisse", inversedBy="command")
     * @ORM\JoinColumn(name="caisse_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $caisse;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Deal", inversedBy="command")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $deal;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Reference", inversedBy="command")
     * @ORM\JoinColumn(name="ref_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $reference;
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="command")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $client;
    /**
     * @ORM\OneToMany(targetEntity="Coupon", mappedBy="command", cascade={"remove"})
     */
    private $coupon;
    /**
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="commande", cascade={"remove"})
     */
    private $operation;

    /**
     * @ORM\ManyToOne(targetEntity="Adress", inversedBy="commande")
     * @ORM\JoinColumn(name="adresse_id", referencedColumnName="id",onDelete="CASCADE" , nullable=true)
     */
    private $adresse;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Post", inversedBy="commande")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id",onDelete="CASCADE" , nullable=true)
     */
    private $poste;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etat = 0;
        $this->dcr = new \DateTime();
        $this->coupon = new \Doctrine\Common\Collections\ArrayCollection();
        $this->operation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        //return $this->getId();
        return $this->getReference()->getTitle();
    }
    public function getMacommande()
    {
        return sprintf("%'.09d\n", $this->getId());
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
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Command
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
     * Set dpa
     *
     * @param \DateTime $dpa
     * @return Command
     */
    public function setDpa($dpa)
    {
        $this->dpa = $dpa;

        return $this;
    }

    /**
     * Get dpa
     *
     * @return \DateTime
     */
    public function getDpa()
    {
        return $this->dpa;
    }

    /**
     * Set qte
     *
     * @param integer $qte
     * @return Command
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Command
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set user
     *
     * @param \EntityBundle\Entity\User $user
     * @return Command
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

    /**
     * Set caisse
     *
     * @param \EntityBundle\Entity\Caisse $caisse
     * @return Command
     */
    public function setCaisse(\EntityBundle\Entity\Caisse $caisse = null)
    {
        $this->caisse = $caisse;

        return $this;
    }

    /**
     * Get caisse
     *
     * @return \EntityBundle\Entity\Caisse
     */
    public function getCaisse()
    {
        return $this->caisse;
    }

    /**
     * Set deal
     *
     * @param \EntityBundle\Entity\Deal $deal
     * @return Command
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
     * Set reference
     *
     * @param \EntityBundle\Entity\Reference $reference
     * @return Command
     */
    public function setReference(\EntityBundle\Entity\Reference $reference = null)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return \EntityBundle\Entity\Reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set client
     *
     * @param \EntityBundle\Entity\Client $client
     * @return Command
     */
    public function setClient(\EntityBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \EntityBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add coupon
     *
     * @param \EntityBundle\Entity\Coupon $coupon
     * @return Command
     */
    public function addCoupon(\EntityBundle\Entity\Coupon $coupon)
    {
        $this->coupon[] = $coupon;

        return $this;
    }

    /**
     * Remove coupon
     *
     * @param \EntityBundle\Entity\Coupon $coupon
     */
    public function removeCoupon(\EntityBundle\Entity\Coupon $coupon)
    {
        $this->coupon->removeElement($coupon);
    }

    /**
     * Get coupon
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Add operation
     *
     * @param \EntityBundle\Entity\Operation $operation
     * @return Command
     */
    public function addOperation(\EntityBundle\Entity\Operation $operation)
    {
        $this->operation[] = $operation;

        return $this;
    }

    /**
     * Remove operation
     *
     * @param \EntityBundle\Entity\Operation $operation
     */
    public function removeOperation(\EntityBundle\Entity\Operation $operation)
    {
        $this->operation->removeElement($operation);
    }

    /**
     * Get operation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set adresse
     *
     * @param \EntityBundle\Entity\Adress $adresse
     * @return Command
     */
    public function setAdresse(\EntityBundle\Entity\Adress $adresse = null)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \EntityBundle\Entity\Adress 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set poste
     *
     * @param \EntityBundle\Entity\Post $poste
     * @return Command
     */
    public function setPoste(\EntityBundle\Entity\Post $poste = null)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return \EntityBundle\Entity\Post 
     */
    public function getPoste()
    {
        return $this->poste;
    }
}
