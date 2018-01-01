<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\BookingRepository")
 */
class Booking
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
     * @ORM\Column(name="booking", type="datetime")
     */
    private $booking;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dcr", type="datetime")
     */
    private $dcr;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Coupon", inversedBy="booking")
     * @ORM\JoinColumn(name="coupon_id", referencedColumnName="id")
     */
    private $coupon;
    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\Deal", inversedBy="booking")
     * @ORM\JoinColumn(name="deal_id", referencedColumnName="id")
     */
    private $deal;
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
     * Set booking
     *
     * @param \DateTime $booking
     * @return Booking
     */
    public function setBooking($booking)
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * Get booking
     *
     * @return \DateTime 
     */
    public function getBooking()
    {
        return  $this->booking;
    }

    /**
     * Set dcr
     *
     * @param \DateTime $dcr
     * @return Booking
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
     * @return Booking
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
     * Set deal
     *
     * @param \EntityBundle\Entity\Deal $deal
     * @return Booking
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
}
