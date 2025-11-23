<?php
namespace model;

class User
{
    private $email;
    private $name;

    /**
     * Für den Prototyp: Benutzer fix im Script
     */
    private static $users = [
        "guest@webdesign.at" => [
            "password" => "guest123",
            "name" => "Gast Benutzer"
        ],
        "test@example.com" => [
            "password" => "passwort",
            "name" => "Test Benutzer"
        ]
    ];

    /**
     * Konstruktor
     */
    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Holt Benutzer anhand der Zugangsdaten
     * Rückgabe: User oder null
     */
    public static function get($email, $password)
    {
        $email = strtolower(trim($email));

        if (!isset(User::$users[$email])) {
            return null;
        }

        // Prototyp ohne Passwort-Hashing
        if (User::$users[$email]["password"] === $password) {
            return new User($email, User::$users[$email]["name"]);
        }
        return null;
    }

    /**
     * Loggt den Benutzer ein (Session)
     */
    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION["user_email"] = $this->email;
        $_SESSION["user_name"]  = $this->name;

        return true;
    }

    /**
     * Prüft ob ein User eingeloggt ist
     */
    public static function isLoggedIn()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION["user_email"]);
    }

    /**
     * Liefert das aktuelle User-Objekt oder null
     */
    public static function currentUser()
    {
        if (!self::isLoggedIn()) {
            return null;
        }

        return new User(
            $_SESSION["user_email"],
            $_SESSION["user_name"]
        );
    }

    /**
     * Logout
     */
    public static function logout()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_unset();
        session_destroy();
    }

    // Getter
    public function getEmail(){
        return $this->email;
    }
    public function getName(){
        return $this->name;
    }
}