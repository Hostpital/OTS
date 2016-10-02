<?php

namespace Factory;

/**
 * Class ORFactory
 * Operating Room Factory
 * @author : Ashutosh Tiwari <atiwari3882@gmail.com>
 */
class ORFactory
{
    /**
     * INSTANCE of the class
     * @param string $className
     * @return object
     */
    public static function getInstance($className)
    {
        $instance = '\Type\\' . self::underscore2Camelcase(strtolower($className));
        if (class_exists($instance)) {
            return new $instance();
        }
    }

    /**
     * @param $string
     * @return mixed|string
     */
    public static function underscore2Camelcase($string)
    {
        return is_string($string) ? str_replace(' ', '', ucwords(str_replace('_', ' ', $string))) : '';
    }
}
