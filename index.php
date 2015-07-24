<?php

    include 'vendor/autoload.php';
    ini_set('display_errors', 'On');
    $loader = new \Anonym\Components\ClassLoader\Psr4Finder();

    $loader->findFile('Foo\Bar\Baz\Dib\Zim\Gir\ClassName');

