<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 */
class Session
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sessionName;

    /**
     * @var \DateTime
     */
    private $sessionStart;

    /**
     * @var \DateTime
     */
    private $sessionEnd;

    /**
     * @var boolean
     */
    private $isSuccess;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $patientId;

    /**
     * @var \AppBundle\Entity\Specialist
     */
    private $specialist;

    /**
     * @var \AppBundle\Entity\Patient
     */
    private $patient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $anesthetists;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $operatingRooms;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->anesthetists = new \Doctrine\Common\Collections\ArrayCollection();
        $this->operatingRooms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set sessionName
     *
     * @param string $sessionName
     * @return Session
     */
    public function setSessionName($sessionName)
    {
        $this->sessionName = $sessionName;

        return $this;
    }

    /**
     * Get sessionName
     *
     * @return string 
     */
    public function getSessionName()
    {
        return $this->sessionName;
    }

    /**
     * Set sessionStart
     *
     * @param \DateTime $sessionStart
     * @return Session
     */
    public function setSessionStart($sessionStart)
    {
        $this->sessionStart = $sessionStart;

        return $this;
    }

    /**
     * Get sessionStart
     *
     * @return \DateTime 
     */
    public function getSessionStart()
    {
        return $this->sessionStart;
    }

    /**
     * Set sessionEnd
     *
     * @param \DateTime $sessionEnd
     * @return Session
     */
    public function setSessionEnd($sessionEnd)
    {
        $this->sessionEnd = $sessionEnd;

        return $this;
    }

    /**
     * Get sessionEnd
     *
     * @return \DateTime 
     */
    public function getSessionEnd()
    {
        return $this->sessionEnd;
    }

    /**
     * Set isSuccess
     *
     * @param boolean $isSuccess
     * @return Session
     */
    public function setIsSuccess($isSuccess)
    {
        $this->isSuccess = $isSuccess;

        return $this;
    }

    /**
     * Get isSuccess
     *
     * @return boolean 
     */
    public function getIsSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Session
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Session
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set patientId
     *
     * @param integer $patientId
     * @return Session
     */
    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;

        return $this;
    }

    /**
     * Get patientId
     *
     * @return integer 
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * Set specialist
     *
     * @param \AppBundle\Entity\Specialist $specialist
     * @return Session
     */
    public function setSpecialist(\AppBundle\Entity\Specialist $specialist = null)
    {
        $this->specialist = $specialist;

        return $this;
    }

    /**
     * Get specialist
     *
     * @return \AppBundle\Entity\Specialist 
     */
    public function getSpecialist()
    {
        return $this->specialist;
    }

    /**
     * Set patient
     *
     * @param \AppBundle\Entity\Patient $patient
     * @return Session
     */
    public function setPatient(\AppBundle\Entity\Patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \AppBundle\Entity\Patient 
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Add anesthetists
     *
     * @param \AppBundle\Entity\Anesthetist $anesthetists
     * @return Session
     */
    public function addAnesthetist(\AppBundle\Entity\Anesthetist $anesthetists)
    {
        $this->anesthetists[] = $anesthetists;

        return $this;
    }

    /**
     * Remove anesthetists
     *
     * @param \AppBundle\Entity\Anesthetist $anesthetists
     */
    public function removeAnesthetist(\AppBundle\Entity\Anesthetist $anesthetists)
    {
        $this->anesthetists->removeElement($anesthetists);
    }

    /**
     * Get anesthetists
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnesthetists()
    {
        return $this->anesthetists;
    }

    /**
     * Add operatingRooms
     *
     * @param \AppBundle\Entity\OperatingRoom $operatingRooms
     * @return Session
     */
    public function addOperatingRoom(\AppBundle\Entity\OperatingRoom $operatingRooms)
    {
        $this->operatingRooms[] = $operatingRooms;

        return $this;
    }

    /**
     * Remove operatingRooms
     *
     * @param \AppBundle\Entity\OperatingRoom $operatingRooms
     */
    public function removeOperatingRoom(\AppBundle\Entity\OperatingRoom $operatingRooms)
    {
        $this->operatingRooms->removeElement($operatingRooms);
    }

    /**
     * Get operatingRooms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperatingRooms()
    {
        return $this->operatingRooms;
    }
}
