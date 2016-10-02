<?php

/**
 * Operating Room Factory
 * 
 * @author : Ashutosh Tiwari <atiwari3882@gmail.com>
 */

namespace Factory;

class ORFactory
{
    public static function getInstance($className)
    {
        $instance = '\Type\\' . self::underscore2Camelcase(strtolower($className));
        if (class_exists($instance)) {
            return new $instance();
        }
    }
    
    public static function underscore2Camelcase($string) {
        if (is_string($string)) {
            return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        } else {
            return '';
        }
    }

}
