<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */


use Anonym\Components\ClassLoader\ClassLoader;

if (!defined('BASE')) {
    define('BASE', getcwd() . '/');
}

$composer = include BASE . 'vendor/autoload.php';

$classloader = new ClassLoader($composer);


// create anonym class loader instance
#return $classloader->register();