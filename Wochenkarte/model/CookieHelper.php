<?php
namespace model;

class CookieHelper {

    public static function isCookieSet($name) {
        return isset($_COOKIE[$name]);
    }

    public static function setCookie($name, $value) {
        setcookie($name, $value, time() + (86400 * 30), "/");
    }
}
