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

        header('Location: login.php');
        exit();

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
