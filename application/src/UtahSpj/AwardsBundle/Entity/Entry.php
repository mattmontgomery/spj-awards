<?php

namespace UtahSpj\AwardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entry
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UtahSpj\AwardsBundle\Entity\EntryRepository")
 */
class Entry
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
     * @ORM\Column(name="title", type="text")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=1024)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_period", type="string", length=255)
     */
    private $entryPeriod;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=1024)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submitted", type="datetimetz")
     */
    private $submitted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetimetz")
     */
    private $updated;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paid", type="boolean", options="{'default':false}")
     */
    private $paid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paid_date", type="datetimetz", nullable=true)
     */
    private $paidDate;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;

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
     * Set title
     *
     * @param string $title
     * @return Entry
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Entry
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
     * Set entryPeriod
     *
     * @param string $entryPeriod
     * @return Entry
     */
    public function setEntryPeriod($entryPeriod)
    {
        $this->entryPeriod = $entryPeriod;

        return $this;
    }

    /**
     * Get entryPeriod
     *
     * @return string 
     */
    public function getEntryPeriod()
    {
        return $this->entryPeriod;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Entry
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set submitted
     *
     * @param \DateTime $submitted
     * @return Entry
     */
    public function setSubmitted($submitted)
    {
        $this->submitted = $submitted;

        return $this;
    }

    /**
     * Get submitted
     *
     * @return \DateTime 
     */
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Entry
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set paid
     *
     * @param boolean $paid
     * @return Entry
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return boolean 
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set paidDate
     *
     * @param \DateTime $paidDate
     * @return Entry
     */
    public function setPaidDate($paidDate)
    {
        $this->paidDate = $paidDate;

        return $this;
    }

    /**
     * Get paidDate
     *
     * @return \DateTime 
     */
    public function getPaidDate()
    {
        return $this->paidDate;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Entry
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set user
     *
     * @param \UtahSpj\AwardsBundle\Entity\User $user
     * @return Entry
     */
    public function setUser(\UtahSpj\AwardsBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UtahSpj\AwardsBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
