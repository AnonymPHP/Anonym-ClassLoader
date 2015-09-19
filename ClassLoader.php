<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Anonym\Components\ClassLoader;

use Composer\Autoload\ClassLoader as Composer;
/**
 * Class ClassLoader
 * @package Anonym\Components
 */
class ClassLoader{

    /**
     * the instance of composer
     *
     * @var Composer
     */
    protected $composer;

    /**
     * the type of array to finded namespaces
     *
     * @var array
     */
    protected $findedNamespaces;

    /**
     * create a new instance register composer
     *
     * @param Composer|null $composer
     */
    public function __construct(Composer $composer = null){
        $this->setComposer($composer);
    }

    /**
     * find file with classmap or psr fix standarts and return it
     *
     * @param string $class the real name of class
     * @return mixed
     */
    public function findFile($class){

        $classMap = $this->getComposer()->getClassMap();

        // determine the name is exists in classmap
        if(isset($classMap[$class])){
            return $classMap[$class];
        }

        if($name = $this->isFindedBefore($class)){
            return $name;
        }else{
            return $this->getComposer()->findFile($class);
        }
    }


    /**
     * Registers this instance as an autoloader.
     *
     * @param bool $prepend Whether to prepend the autoloader or not
     */
    public function register($prepend = false)
    {
        spl_autoload_register([$this, 'loadFile'], true, $prepend);
    }

    /**
     * Unregisters this instance as an autoloader.
     */
    public function unregister()
    {
        spl_autoload_unregister([$this, 'loadFile']);
    }

    /**
     * @return Composer
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * @param Composer $composer
     * @return ClassLoader
     */
    public function setComposer(Composer $composer)
    {
        $this->composer = $composer;
        return $this;
    }
}