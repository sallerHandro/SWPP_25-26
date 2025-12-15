<?php
namespace model;

class User {

    public $email;
    public $password;

    private static $users = [
        "gast@example.com"  => "gast123",
        "frau@example.com"  => "frau123",
    ];

    public function __construct($email) {
        $this->email = $email;
    }

    public static function get($email, $password) {
        if (isset(self::$users[$email]) && self::$users[$email] === $password) {
            return new User($email);
        }
        return null;
    }

    public function login(){
        $_SESSION["user"] = $this->email;
        return true;
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

    public static function isLoggedIn(){
        return isset($_SESSION["user"]);
    }

    public function getEmail()
    {
        return $this->email;
    }
}


