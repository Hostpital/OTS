<?php

/**
 * Class Manager
 */
class Manager
{
    /**
     * RETURN instance of the class type
     * @param $className
     * @return object
     */
    public function setClass($className)
    {
        return \Factory\ORFactory::getInstance($className);
    }
}