<?php
require('./src/views/register.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = validateInput($_POST['name']);
        $email = validateEmail($_POST['email']);
        $password = validatePassword($_POST['password']);

        // Si nous arrivons ici, toutes les validations ont réussi

        $passHash = password_hash($password, PASSWORD_DEFAULT);

        registerUserIntoDatabase($name, $email, $passHash);

        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
        ];

        header('Location: ?page=login.php');
        exit();

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

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
