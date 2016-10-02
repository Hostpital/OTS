<?php

namespace Type;

class Specialist extends \AbstractEntity
{
    /**
     * @var
     */
    private $session;

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @var
     */
    private $operatingRoom;

    /**
     * @return mixed
     */
    public function getOperatingRoom()
    {
        return $this->operatingRoom;
    }
    
    /**
     * @param OperatingRoom $orObj
     * @return object
     */
    public function getByOR(OperatingRoom $orObj)
    {
        return $orObj->getSpecialist();
    }
}