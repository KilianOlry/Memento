<?php

    if (empty ($_SESSION['user'])) {
        header('Location: ?page=login');
    }
    require ('./public/views/new_post-it.php');

    $form = new FormControll;
    $postit= new PostItManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {

            $title = $form->validateInput($_POST['title']);
            $content = $form->validateInput($_POST['content']);
            $date = $form->validateInput($_POST['date']);
            $id = $_SESSION['user']['id'];

            $token = $_POST['token'];

            if (!$token || $token !== $_SESSION['token']) {
                header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                exit;
            }
            $postit->insertPostIt($title, $content, $date, $id, $db->getPdo());

        } catch (\Throwable $th) {
            //throw $th;
        }   
            header('Location: index.php');     
    }

?>