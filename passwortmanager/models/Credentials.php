<?php

require_once "DatabaseObject.php";

class Credentials implements DatabaseObject
{
    private $id = 0;
    private $name = "";
    private $domain = "";
    private $cms_username = "";
    private $cms_password = "";

    private $errors = [];

    public function __construct(){

    }

    public function validate(){
        return $this->validatehelper("Name", "name", $this->name, 32) &
            $this->validatehelper("Domäne", "domain", $this->domain, 128) &
            $this->validatehelper("CMS-Benutzername", "cms_username", $this->cms_username, 64) &
            $this->validatehelper("CMS-Passwort", "cms_password", $this->cms_password, 64);

    }

    private function validateHelper($label, $key, $value, $maxLength){
        if (strlen($value) == 0){
            $this->errors[$key] = "$label darf nicht leer sein";
            return false;
        } elseif (strlen($value) < $maxLength){
            $this->errors[$key] = "$label zu lang (max. $maxLength Zeichen)";
            return false;
        } else{
            return true;
        }
    }

    public function save(){
        if ($this->validate()){

            if ($this->id != null && $this->id > 0){
                $this->update();
            } else{
                $this->id = $this->create();
            }

            return true;
        }

        return false;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function create()
    {
        $db = Database::connect();
        $sql = "INSERT INTO credentials (name, domain, cms_username, cms_password) VALUES(?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->name, $this->domain, $this->cms_username, $this->cms_password));
        $lastId = $db->lastInsertId();
        Database::disconnect();
        return $lastId;
    }

    public function update()
    {
        $db = Database::connect();
        $sql = "UPDATE credentials SET name = ?, domain = ?, cms_username = ?, cms_password = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->name, $this->domain, $this->cms_username, $this->cms_password, $this->id));
        Database::disconnect();
    }

    public static function get($id)
    {
        $db = Database::connect();
        $sql = "INSERT INTO credentials (name, domain, cms_username, cms_password) VALUES(?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->name, $this->domain, $this->cms_username, $this->cms_password));
        $lastId = $db->lastInsertId();
        Database::disconnect();
    }

    public static function getAll()
    {
        $db = Database::connect();
        $sql = "INSERT INTO credentials (name, domain, cms_username, cms_password) VALUES(?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->name, $this->domain, $this->cms_username, $this->cms_password));
        $lastId = $db->lastInsertId();
        Database::disconnect();
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $sql = "INSERT INTO credentials (name, domain, cms_username, cms_password) VALUES(?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($this->name, $this->domain, $this->cms_username, $this->cms_password));
        $lastId = $db->lastInsertId();
        Database::disconnect();
    }
}