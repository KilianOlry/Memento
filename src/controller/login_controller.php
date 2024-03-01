<?php
if (isset($_SESSION['user'])) {
    header('Location: ?page=homepage');
    exit();
}

require('./public/views/login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $form = new FormControll;
        $email = $form->validateEmail($_POST['email']);

        $userManager = new UserManager();
        $user = $userManager->getOne($email, $db->getPdo());

        if ($user) {

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'id' => $user['id'],
                ];
                $_SESSION['token'] = md5(uniqid(mt_rand(), true));

                header('Location: index.php');
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
