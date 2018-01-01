<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Remboursement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\RemboursementRepository")
 */
class Remboursement
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
     * @ORM\ManyToOne(targetEntity="Coupon", inversedBy="remboursement")
     * @ORM\JoinColumn(name="coupon_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $coupon;
    /**
     * @ORM\ManyToOne(targetEntity="Ticket", inversedBy="remboursement")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $ticket;
    /**
 * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\BigFidHistorique", inversedBy="remboursement")
 * @ORM\JoinColumn(name="historique_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
 */
    private $historique;

    /**
     * @ORM\ManyToOne(targetEntity="Virement", inversedBy="remboursement")
     * @ORM\JoinColumn(name="virement_id", referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    private $virement;


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
     * @return Remboursement
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
     * Set coupon
     *
     * @param \EntityBundle\Entity\Coupon $coupon
     * @return Remboursement
     */
    public function setCoupon(\EntityBundle\Entity\Coupon $coupon = null)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Get coupon
     *
     * @return \EntityBundle\Entity\Coupon 
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Set historique
     *
     * @param \EntityBundle\Entity\BigFidHistorique $historique
     * @return Remboursement
     */
    public function setHistorique(\EntityBundle\Entity\BigFidHistorique $historique = null)
    {
        $this->historique = $historique;

        return $this;
    }

    /**
     * Get historique
     *
     * @return \EntityBundle\Entity\BigFidHistorique 
     */
    public function getHistorique()
    {
        return $this->historique;
    }

    /**
     * Set virement
     *
     * @param \EntityBundle\Entity\Virement $virement
     * @return Remboursement
     */
    public function setVirement(\EntityBundle\Entity\Virement $virement = null)
    {
        $this->virement = $virement;

        return $this;
    }

    /**
     * Get virement
     *
     * @return \EntityBundle\Entity\Virement 
     */
    public function getVirement()
    {
        return $this->virement;
    }

    /**
     * Set ticket
     *
     * @param \EntityBundle\Entity\Ticket $ticket
     * @return Remboursement
     */
    public function setTicket(\EntityBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \EntityBundle\Entity\Ticket 
     */
    public function getTicket()
    {
        return $this->ticket;
    }
}
