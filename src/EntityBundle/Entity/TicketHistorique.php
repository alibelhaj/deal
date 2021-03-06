<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketHostorique
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TicketHistorique
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
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\User", inversedBy="tickethistorique")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="Ticket", inversedBy="tickethistorique")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $ticket;
    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=64)
     */
    private $action;



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
     * @return TicketHostorique
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
     * Set action
     *
     * @param string $action
     * @return TicketHostorique
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set user
     *
     * @param \EntityBundle\Entity\User $user
     * @return TicketHistorique
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
     * Set ticket
     *
     * @param \EntityBundle\Entity\Ticket $ticket
     * @return TicketHistorique
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
