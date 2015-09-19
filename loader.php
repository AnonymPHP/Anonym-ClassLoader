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

// include composer autoloader
$composer = include BASE . 'vendor/autoload.php';

// create a new class loader instance with composer
$classloader = new ClassLoader($composer);

// register anonym class loader to spl_autoload
return $classloader->register();