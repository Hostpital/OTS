<?php

namespace Type;

/**
 * Class Anesthetist
 * @package Type
 */
class Anesthetist extends \AbstractEntity
{
    /**
     * @param OperatingRoom $orObj
     * @return object
     */
    public function getByOR(OperatingRoom $orObj)
    {
        return $orObj->getAnesthetists();
    }
}