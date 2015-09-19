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
     * Class ClassLoader
     * @package Anonym\Components\ClassLoader
     */
    class ClassLoader
    {
        /**
         * @var Psr4Finder
         */
        private $psr4Loader;

        /**
         * @var Psr0Finder
         */
        private $psr0Loader;

        /**
         * psr4 ön adlarını tutar
         *
         * @var array
         */
        private $psr4prefix;

        /**
         * psr0 önadlarını tutar
         *
         * @var array
         */
        private $psr0prefix;

        /**
         * sınıf haritasını tutar
         *
         * @var array
         */
        private $classMap;

        /**
         * @return Psr4Finder
         */
        public function getPsr4Loader()
        {
            return $this->psr4Loader;
        }

        /**
         * @param Psr4Finder $psr4Loader
         * @return ClassLoader
         */
        public function setPsr4Loader($psr4Loader)
        {
            $this->psr4Loader = $psr4Loader;

            return $this;
        }

        /**
         * @return Psr0Finder
         */
        public function getPsr0Loader()
        {
            return $this->psr0Loader;
        }

        /**
         * @param Psr0Finder $psr0Loader
         * @return ClassLoader
         */
        public function setPsr0Loader($psr0Loader)
        {
            $this->psr0Loader = $psr0Loader;

            return $this;
        }

        /**
         * @return array
         */
        public function getPsr4prefix()
        {
            return $this->psr4prefix;
        }

        /**
         * @param array $psr4prefix
         * @return ClassLoader
         */
        public function setPsr4prefix($psr4prefix)
        {
            $this->psr4prefix = $psr4prefix;

            return $this;
        }

        /**
         * @return array
         */
        public function getPsr0prefix()
        {
            return $this->psr0prefix;
        }

        /**
         * @param array $psr0prefix
         * @return ClassLoader
         */
        public function setPsr0prefix($psr0prefix)
        {
            $this->psr0prefix = $psr0prefix;

            return $this;
        }

        /**
         * @return array
         */
        public function getClassMap()
        {
            return $this->classMap;
        }

        /**
         * @param array $classMap
         * @return ClassLoader
         */
        public function setClassMap($classMap)
        {
            $this->classMap = $classMap;

            return $this;
        }


    }
