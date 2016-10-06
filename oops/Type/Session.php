<?php

namespace Type;

/**
 * Class Session
 * @package Type
 */
class Session extends \AbstractEntity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $from;

    /**
     * @var \DateTime
     */
    private $to;

    /**
     * @var array
     */
    private $anesthetists;

    /**
     * @var Specialist
     */
    private $specialist;

    /**
     * @var array
     */
    private $operatingRooms;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->anesthetists = [];
        $this->operatingRooms = [];
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $dateTime
     * @return $this
     */
    public function setFrom(\DateTime $dateTime)
    {
        $this->from = $dateTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param \DateTime $dateTime
     * @return $this
     */
    public function setTo(\DateTime $dateTime)
    {
        $this->to = $dateTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param Anesthetist $anesthetist
     * @return $this
     */
    public function addAnesthetist(Anesthetist $anesthetist)
    {
        $this->anesthetists[] = $anesthetist;

        return $this;
    }

    /**
     * @return array
     */
    public function getAnesthetists()
    {
        return $this->anesthetists;
    }

    /**
     * @param Specialist $specialist
     * @return $this
     */
    public function setSpecialist(Specialist $specialist)
    {
        $this->specialist = $specialist;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpecialist()
    {
        return $this->specialist;
    }

    /**
     * @param OperatingRoom $operatingRoom
     * @return $this
     */
    public function addOperatingRoom(OperatingRoom $operatingRoom)
    {
        $this->operatingRooms[] = $operatingRoom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperatingRooms()
    {
        return $this->operatingRooms;
    }
}