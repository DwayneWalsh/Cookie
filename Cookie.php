<?php

/**
 * Cookie wrapper
 *
 * @since 2019-01-09
 * @version 1.0
 * @author Dwayne Walsh
 * @link https://github.com/DwayneWalsh
 *
 */

class Cookie
{
    /**
     * Checks if cookie exists
     * @param string $name          A cookie name
     *
     * @return boolean
     */
    public static function exists($name) 
    {
        return (isset($_COOKIE[$name]) ? true : false);
    }

    /**
     * Gets a cookie`s value if it exists
     * @param string $name          A cookie name
     *
     * @return string
     */
    public static function get($name) 
    {
        if(self::exists($name)) {
            return $_COOKIE[$name];
        }
        return '';
    }

    /**
     * Creates a cookie
     * @param string $name          A cookie name
     * @param string $value         Value of a cookie
     * @param string $expiry        Expiry date of a cookie
     *
     * @return boolean
     */
    public static function put($name, $value, $expiry) 
    {
        if(setcookie($name, $value, time() + $expiry, '/')) {
            return true;
        }
        return false;
    }

    /**
     * Deletes a cookie
     * @param string $name          A cookie name
     */
    public static function delete($name) 
    {
        self::put($name, '', time() - 1);
    }
}
