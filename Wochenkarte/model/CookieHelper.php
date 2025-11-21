<?php

namespace model;

class CookieHelper
{
    public static function setCookie($name, $value, $expire = 0){
        setcookie($name, $value, $expire);
    }

    public static function isCookieSet($name){
        return isset($_COOKIE[$name]);
    }
}