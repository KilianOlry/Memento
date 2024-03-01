<?php
require('./public/views/register.php');

$userManager = new UserManager();
$form = new FormControll;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $name = $form->validateInput($_POST['name']);
        $email = $form->validateInput($_POST['email']);
        $password = $form->validateInput($_POST['password']);


        $passHash = $userManager->passwordHash($_POST['password']);
        $userManager->inserIntoDatabase($name, $email, $passHash, $db->getPdo());

        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Votre compte est crée veuillez vous connecter';


    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
