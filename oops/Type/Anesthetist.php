<?php

namespace Type;

/**
 * Class Anesthetist
 * @package Type
 */
class Anesthetist extends \AbstractEntity
{
    /**
     * @var
     */
    private $name;

    /**
     * @var array
     */
    private $sessions;

    /**
     * Anesthetist constructor.
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
}