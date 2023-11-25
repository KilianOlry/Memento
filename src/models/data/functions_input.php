<?php

function validateInput($name)
{
    $cleanInput = strip_tags($name);
    if (empty($cleanInput)) {
        throw new Exception('Le champ ne peut pas être vide.');
    }
    return $cleanInput;
}

function validateEmail($email)
{
    $cleanEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($cleanEmail === false) {
        throw new Exception("Ce n'est pas une adresse email valide.");
    }
    return $cleanEmail;
}

function validatePassword($password)
{
    if (strlen($password) <= 8) {
        throw new Exception('Le mot de passe est trop court.');
    }
    return $password;
}