<?php


$loader = include 'loader.php';

if ($loader instanceof \Anonym\Components\ClassLoader\ClassLoader) {
    $loader->loadFile('Anonym\Components\ClassLoader\ClassLoader');
    var_dump($loader->loadFile('Anonym\Components\ClassLoader\Test'));
}