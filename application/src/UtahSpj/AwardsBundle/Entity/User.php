<?php

namespace UtahSpj\AwardsBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="UtahSpj\AwardsBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="user")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $entries;

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
     * @param mixed $entries
     */
    public function setEntries($entries)
    {
        $this->entries = $entries;
    }

    /**
     * @return mixed
     */
    public function getEntries()
    {
        return $this->entries;
    }
    /**
     * @return mixed
     */
    public function getPaidEntries()
    {
        $entries = ($this->entries->filter(function($obj) { if($obj->getPaid()) { return $obj; } }));
        return $entries;
    }
    /**
     * @return mixed
     */
    public function getUnpaidEntries()
    {
        $entries = ($this->entries->filter(function($obj) { if(!$obj->getPaid()) { return $obj; } }));
        return $entries;
    }

}
