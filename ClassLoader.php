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

use Exception;
use Composer\Autoload\ClassLoader as Composer;

/**
 * Class ClassLoader
 * @package Anonym\Components
 */
class ClassLoader
{

    /**
     * the instance of composer
     *
     * @var Composer
     */
    protected $composer;

    /**
     * the namespace name of current proccess
     *
     * @var string
     */
    private $currentNamespace;

    /**
     * the class name of current process
     *
     * @var string
     */
    private $currentClass;

    /**
     * the type of array to finded namespaces
     *
     * @var array
     */
    protected static $findedNamespaces;

    /**
     * create a new instance register composer
     *
     * @param Composer|null $composer
     */
    public function __construct(Composer $composer = null)
    {
        $this->setComposer($composer);
    }

    /**
     * find and load class file
     *
     * @param string $abstarct the name of class
     * @return bool
     */
    public function loadFile($abstarct)
    {
        if($path = $this->findFile($abstarct)){
            if (file_exists($path)) {
                \Composer\Autoload\includeFile($path);

                return true;
            }else{
                # throw new Exception(sprintf('%s file is not found', $$path));
            }
        }
    }
    /**
     * find file with classmap or psr fix standarts and return it
     *
     * @param string $class the real name of class
     * @return mixed
     */
    public function findFile($class)
    {

        if(!is_string($class)){
            return false;
        }

        $classMap = $this->getComposer()->getClassMap();

        // determine the name is exists in classmap
        if (isset($classMap[$class])) {
            return $classMap[$class];
        }

        if ($name = $this->isFindedBefore($class)) {
            return $name;
        } else {
            $find = $this->getComposer()->findFile($class);

            static::$findedNamespaces[$this->currentNamespace] = $this->parseFindedPath($find);
            return $find;
        }
    }
    /**
     * if $class namespace is finded before, we will find it current path with find it's namespace
     *
     * @param string $class
     * @return bool|string
     */
    private function isFindedBefore($class = '')
    {
        if($namespace = $this->findNamespaceInClass($class)){

            // if namespace dont found before, return false
            if (!isset(self::$findedNamespaces[$namespace])) {
                $this->currentNamespace = $namespace;
                return false;
            }


            $namespace = substr($namespace, 0, strlen($namespace)-1);
            return $this->findWithPsr4($namespace, $this->currentClass) ?: $this->findWithPsr0($namespace, $this->currentClass);
        }else{
            return false;
        }
    }

    /**
     * parse finded path with slahes to namespace
     *
     * @param string $path
     * @return string
     */
    private function parseFindedPath($path){
        $parse = explode('/', $path);

        $map = [];
        foreach($parse as $value){
            if($value !== ''){
                $map[] = $value;
            }
        }


        $slice = array_slice($map, 0, count($map)-1);
        return '/'.join('/', $slice);
    }




    /**
     * find file local path with psr-4 fix standarts
     *
     * @param string $namespace the namespace of class
     * @param string $abstract   the name of class
     * @return bool|string
     */
    private function findWithPsr4($namespace, $abstract){
        $class = $abstract.'.php';

        $path = str_replace('\\', '/', $namespace).$class;

        return file_exists($path) ? $path : false;
    }

    private function findWithPsr0($abstract){


    }
    /**
     * find class namespace in class alias
     *
     * @param string $abstract
     * @return bool|string
     */
    private function findNamespaceInClass($abstract)
    {
        $namespaces = explode('\\', $abstract);

        $this->currentClass = end($namespaces);
        // if namespace not exists return global namespace name
        if (count($namespaces) === 1) {
            return '';
        }

        if (count($namespaces) > 1) {
            $parsedToNamespace = array_slice($namespaces, 0, count($namespaces)-1);

            return join('\\', $parsedToNamespace).'\\';
        }

        return false;
    }

    /**
     * Registers this instance as an autoloader.
     *
     * @param bool $prepend Whether to prepend the autoloader or not
     * @return $this
     */
    public function register($prepend = false)
    {
        spl_autoload_register([$this, 'loadFile'], true, $prepend);
        return $this;
    }

    /**
     * Unregisters this instance as an autoloader.
     * @return $this
     */
    public function unregister()
    {
        spl_autoload_unregister([$this, 'loadFile']);
        return $this;
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