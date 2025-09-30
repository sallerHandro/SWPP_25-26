<?php

$errors = [];

function validate($name, $email, $examDate, $grade, $subject) {
    return validateName($name) & validateEmail($email) & validateGrade($grade)
        & validateSubject($subject) & validateExamDate($examDate);

}

function validateName($name){

    global $errors;

    if (strlen($name) == 0){
        $errors['name'] = "Name darf nicht leer sein!";
        return false;
    } elseif (strlen($name) > 20) {
        $errors['name'] = "Name darf maximal 20 Zeichen haben!";
        return false;
    } else {
        return true;
    }
}

function validateExamDate($examDate){

    global $errors;

    if (strlen($name) == 0){
        $errors['name'] = "Name darf nicht leer sein!";
        return false;
    } elseif (strlen($name) > 20) {
        $errors['name'] = "Name darf maximal 20 Zeichen haben!";
        return false;
    } else {
        return true;
    }
}

function validateSubject($subject){

    global $errors;

    if (strlen($name) == 0){
        $errors['name'] = "Name darf nicht leer sein!";
        return false;
    } elseif (strlen($name) > 20) {
        $errors['name'] = "Name darf maximal 20 Zeichen haben!";
        return false;
    } else {
        return true;
    }
}

function validateGrade($grade){

    global $errors;

    if ($grade < 1 || $grade > 5) {
        $errors['name'] = "Name darf nicht leer sein!";
        return false;
    } elseif (strlen($name) > 20) {
        $errors['name'] = "Name darf maximal 20 Zeichen haben!";
        return false;
    } else {
        return true;
    }
}

function validateEmail($email){

    global $errors;

    if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email ungültig";
        return false;
    } else{
        return true;
    }
}
