<?php

namespace models;

class GradeEntry
{
    private $name = "";
    private $email = "";
    private $examDate = "";
    private $subject = "";
    private $grade = "";
    private $errors = [];

    public function __construct(){

    }

    public static function getAll(){

    }

    public static function deleteAll(){

    }

    public function save(){
        if ($this->validate()){
            //speichern

            return true;
        }
        return false;
    }

    function validate($name, $email, $examDate, $grade, $subject) {
        return validateName($name) & validateEmail($email) & validateGrade($grade)
            & validateSubject($subject) & validateExamDate($examDate);
    }

    function validateName($name){
        if (strlen($this->name) == 0){
            $this->errors['name'] = "Name darf nicht leer sein!";
            return false;
        } elseif (strlen($this->name) > 20) {
            $this->errors['name'] = "Name darf maximal 20 Zeichen haben!";
            return false;
        } else {
            return true;
        }
    }

    function validateExamDate(){
        try {
            if ($this->examDate == ""){
                $this->errors['examDate'] = "Prüfungsdatum darf nicht leer sein!";
                return false;
            } elseif (new DateTime($this->examDate) > new DateTime()){
                $this->errors['examDate'] = "Prüfungsdatum darf nicht in der Zukunft liegen!";
                return false;
            } else {
                return true;
            }
        } catch (Exception $e){
            $this->errors['examDate'] = "Prüfungsdatum ungültig";
        }
    }

    function validateSubject(){
        if ($this->subject != 'm' && $this->subject != 'd' && $this->subject != 'e') {
            $this->errors['subject'] = "Fach ungültig";
            return false;
        } else{
            return true;
        }
    }

    function validateGrade(){
        if (!is_numeric($this->grade) || $this->grade < 1 || $this->grade > 5) {
            $this->errors['grade'] = "Note ungültig";
            return false;
        } else{
            return true;
        }
    }

    function validateEmail(){
        if ($this->email != "" && !filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Email ungültig";
            return false;
        } else{
            return true;
        }
    }





    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getExamDate()
    {
        return $this->examDate;
    }

    /**
     * @param string $examDate
     */
    public function setExamDate($examDate)
    {
        $this->examDate = $examDate;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }



}