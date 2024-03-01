<?php

class FormControll
{

  public function validateEmail($email): string
  {
    $cleanEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($cleanEmail === false) {
      throw new Exception("Ce n'est pas une adresse email valide.");
    }
    return $cleanEmail;
  }

  public function validateInput($name)
  {
    $cleanInput = strip_tags($name);
    if (empty($cleanInput)) {
      throw new Exception('Le champ ne peut pas être vide.');
    }
    return $cleanInput;
  }
  public function validatePassword($password)
{
    if (strlen($password) <= 8) {
        throw new Exception('Le mot de passe est trop court.');
    }
    return $password;
}
}
