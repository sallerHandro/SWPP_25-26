<?php

namespace model;

class CookieHelper
{
    public static function setCookie($name, $value, $expireSeconds = 3600){
        $expires = time() + $expireSeconds;
        setcookie($name, $value, $expireSeconds);
        $_COOKIE[$name] = $value;
    }

    public static function isCookieSet($name){
        return isset($_COOKIE[$name]);
    }
}