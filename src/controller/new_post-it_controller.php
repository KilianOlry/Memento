<?php

    if (!isset ($_SESSION['user'])) {
        header('Location: login.php');
    }
    require ('./public/views/new_post-it.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $title = validateInput($_POST['title']);
            $content = validateInput($_POST['content']);
            $date = validateInput($_POST['date']);
            $id = $_SESSION['user']['id'];

            $token = $_POST['token'];

            if (!$token || $token !== $_SESSION['token']) {
                header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                exit;
            }
            addPostIt($title, $content, $date, $id);

        } catch (\Throwable $th) {
            //throw $th;
        }   
            header('Location: index.php');     
    }

?>