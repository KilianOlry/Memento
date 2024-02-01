<?php
require('./public/views/register.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = validateInput($_POST['name']);
        $email = validateEmail($_POST['email']);
        $password = validatePassword($_POST['password']);


        $passHash = password_hash($password, PASSWORD_DEFAULT);
        registerUserIntoDatabase($name, $email, $passHash);


        header('Location: ?page=login.php');
        exit();

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
