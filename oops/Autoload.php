<?php

define('OOPS_ROOT', __DIR__ . '/');
spl_autoload_register(array('OTAutoload', 'autoload'));

class OTAutoload
{
    public static function autoload($className)
    {
        $className = ltrim($className, '\\');
        $fileName = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists(OOPS_ROOT . $fileName)) {
            require $fileName;
        }
    }
}