<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voterpartner
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\VoterpartnerRepository")
 */
class Voterpartner
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
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer")
     */
    private $rate;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="voterpartner")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $partner;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="voterpartner")
     * @ORM\JoinColumn(name="voter_id", referencedColumnName="id")
     **/
    private $voter;


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
     * Set rate
     *
     * @param integer $rate
     * @return Voterpartner
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return integer 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set partner
     *
     * @param \EntityBundle\Entity\User $partner
     * @return Voterpartner
     */
    public function setPartner(\EntityBundle\Entity\User $partner = null)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get partner
     *
     * @return \EntityBundle\Entity\User 
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Set voter
     *
     * @param \EntityBundle\Entity\User $voter
     * @return Voterpartner
     */
    public function setVoter(\EntityBundle\Entity\User $voter = null)
    {
        $this->voter = $voter;

        return $this;
    }

    /**
     * Get voter
     *
     * @return \EntityBundle\Entity\User 
     */
    public function getVoter()
    {
        return $this->voter;
    }
}
