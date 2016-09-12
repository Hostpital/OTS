<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 */
class Patient
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $attendant;

    /**
     * @var string
     */
    private $contactNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Sessions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Sessions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Patient
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
     * Set address
     *
     * @param string $address
     * @return Patient
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set attendant
     *
     * @param string $attendant
     * @return Patient
     */
    public function setAttendant($attendant)
    {
        $this->attendant = $attendant;

        return $this;
    }

    /**
     * Get attendant
     *
     * @return string 
     */
    public function getAttendant()
    {
        return $this->attendant;
    }

    /**
     * Set contactNumber
     *
     * @param string $contactNumber
     * @return Patient
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get contactNumber
     *
     * @return string 
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Add Sessions
     *
     * @param \AppBundle\Entity\Session $sessions
     * @return Patient
     */
    public function addSession(\AppBundle\Entity\Session $sessions)
    {
        $this->Sessions[] = $sessions;

        return $this;
    }

    /**
     * Remove Sessions
     *
     * @param \AppBundle\Entity\Session $sessions
     */
    public function removeSession(\AppBundle\Entity\Session $sessions)
    {
        $this->Sessions->removeElement($sessions);
    }

    /**
     * Get Sessions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSessions()
    {
        return $this->Sessions;
    }
}
