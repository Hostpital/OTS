<?php

namespace Type;

/**
 * Class OperatingRoom
 * @package Type
 */
class OperatingRoom extends \AbstractEntity
{
    /**
     * @var
     */
    private $specialist;

    /**
     * @var
     */
    private $anesthetists;

    /**
     * @var
     */
    private $session;

    /**
     * @return mixed
     */
    public function getSpecialist()
    {
        return $this->specialist;
    }

    /**
     * @return mixed
     */
    public function getAnesthetists()
    {
        return $this->anesthetists;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param Specialist $specialist
     * @return object
     */
    public function getORBySpecialist(Specialist $specialist)
    {
        return $specialist->getOperatingRoom();
    }
}