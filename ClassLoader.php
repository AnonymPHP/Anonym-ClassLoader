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
     * create a new instance register composer
     *
     * @param Composer|null $composer
     */
    public function __construct(Composer $composer = null){
        $this->setComposer($composer);
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