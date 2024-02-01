<?php
require('./public/views/login.php');

if (isset($_SESSION['user'])) {
    header('Location: ?page=index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        isset($_POST['email'], $_POST['password'])
        && !empty($_POST['email']) && !empty($_POST['password'])
    ) {

        $email = validateEmail($_POST['email']);

        $user = loginUser($email);

        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'id' => $user['id'],
                ];
                $_SESSION['token'] = md5(uniqid(mt_rand(), true));

                header('Location: ?page=index.php');
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['message'] = 'Mot de passe incorrect';
            }
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = "L'utilisateur n'existe pas";
        }
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Formulaire incomplet";
    }
}
