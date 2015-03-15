<?php

class Autoloader
{
 
    public static function yolo ($className) {
         
        $class = 'app/controller/' . $className . '.php';
        require_once $class;

        return new $className();
    }
 
}