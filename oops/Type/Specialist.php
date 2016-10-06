<?php

namespace Type;

/**
 * Class Specialist
 * @package Type
 */
class Specialist extends \AbstractEntity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $sessions;

    /**
     * Specialist constructor.
     */
    public function __construct()
    {
        $this->sessions = [];
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Session $session
     * @return $this
     */
    public function addSession(Session $session)
    {
        $this->sessions[] = $session;

        return $this;
    }

    /**
     * @return array
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Check availability 
     * @param \DateTime $from
     * @param \DateTime $to
     * @return bool
     */
    public function checkAvailability(\DateTime $from, \DateTime $to)
    {
        $isAvailable = false;
        foreach ($this->getSessions() as $session) {
            if (($from >= $session->getFrom() && $from <= $session->getTo()) || ($to >= $session->getFrom() && $to <= $session->getTo())) {
                $isAvailable = true;
                break;
            }
        }

        return $isAvailable;
    }
}