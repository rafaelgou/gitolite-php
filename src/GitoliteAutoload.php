<?php
/**
 * Gitolite Autoload Class
 *
 * Project:   gitolite-php
 * File:      src/GitoliteAutoload.php
 *
 * Copyright (C) 2012 Rafael Goulart
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by  the Free
 * Software Foundation; either version 2 of the License, or (at your option)
 * any later version.
 *
 * @author  Rafael Goulart <rafaelgou@gmail.com>
 * @license GNU Lesser General Public License
 * @link    https://github.com/rafaelgou/gitolite-php
 * see CHANGELOG
 */
class GitoliteAutoload
{

    /**
     * The init path for autoload
     * @var string
     */
    static public $initPath;

    /**
     * Flag to check if is already intialized
     * @var boolean
     */
    static public $initialized = false;

    /**
     * Constructor
     *
     * set private to avoid directly instatiation to implement
     * but is not a Singleton Design Pattern
     **/
    private function __construct()
    {
    }

    /**
     * Configure autoloading using Gitolite.
     *
     * This is designed to play nicely with other autoloaders.
     *
     * @param string $initPath The init script to load when autoloading the first Gitolite class
     *
     * @return void
     */
    public static function registerAutoload($initPath = null)
    {
        self::$initPath = $initPath;
        spl_autoload_register(array('GitoliteAutoload', 'autoload'));
    }

    /**
     * Internal autoloader for spl_autoload_register().
     *
     * @param string $class The class to load
     *
     * @return void
     */
    public static function autoload($class)
    {
        $path = dirname(__FILE__).'/'.str_replace('\\', '/', $class).'.php';
        if (!file_exists($path)) {
            return;
        }
        if (self::$initPath && !self::$initialized) {
            self::$initialized = true;
            require self::$initPath;
        }
        require_once $path;
    }

}