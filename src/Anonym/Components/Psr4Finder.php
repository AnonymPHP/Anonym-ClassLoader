<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Components\ClassLoader;

    /**
     * Class Psr4Finder
     * @package Anonym\Components\ClassLoader
     */
    class Psr4Finder
    {


        /**
         * prefix leri tutar
         *
         * @var array
         */
        private $prefixes;

        /**
         * Dosyayı bulur ve yolunu döndürür
         *
         * @param string $class
         * @return string
         */

        public function findFile($class = '')
        {
            // the current namespace prefix
            $prefix = $class;
        }


    }