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

include 'vendor/composer/ClassLoader.php';

use Composer\Autoload\ClassLoader as Compoer;

$composer = new Compoer();

$map = require BASE . 'vendor/composer/autoload_namespaces.php';
foreach ($map as $namespace => $path) {
    $composer->set($namespace, $path);
}

$map = require BASE . 'vendor/composer/autoload_psr4.php';
foreach ($map as $namespace => $path) {
    $composer->setPsr4($namespace, $path);
}

$classMap = require BASE . 'vendor/composer/autoload_classmap.php';
if ($classMap) {
    $composer->addClassMap($classMap);
}

$classloader = new ClassLoader($composer);

// create anonym class loader instance
return $classloader->register();