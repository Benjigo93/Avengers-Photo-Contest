<?php

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
        if (file_exists('views/includes/partials/'.$class.'.php'))
        {
            require 'views/includes/partials/'.$class.'.php';
        }
        elseif (file_exists('views/includes/partials/components/'.$class.'.php'))
        {
            require 'views/includes/partials/components/'.$class.'.php';
        }
        else
        {
            die('Class not found');
        }
    }
}