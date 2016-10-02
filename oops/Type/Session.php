<?php

namespace Type;

/**
 * Class Session
 * @package Type
 */
class Session extends \AbstractEntity
{
    /**
     * @param OperatingRoom $orObj
     * @return object
     */
    public function getByOR(OperatingRoom $orObj)
    {
        return $orObj->getSession();
    }

    /**
     * @param Specialist $specialistObj
     * @return object
     */
    public function getBySpecialist(Specialist $specialistObj)
    {
        return $specialistObj->getSession();
    }
}