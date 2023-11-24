<?php

    if (!isset ($_SESSION['user'])) {
        header('Location: login.php');
    }
        if (!empty($_POST)) {
            if (isset($_POST['title'], $_POST['content'], $_POST['date'])
                && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['date'])) {

                    
                $token = $_POST['token'];

                if (!$token || $token !== $_SESSION['token']) {
                    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                    exit;
                }


                    $title = strip_tags($_POST['title']);
                    $content = strip_tags($_POST['content']);


                    $sql = "INSERT INTO post_it(title, content, date, user_id) VALUES(:title, :content, :date, :user_id)";

                    require ('./connexion.php');

                    $query = $bdd->prepare($sql);
            
                    $query->execute([
                        'title' => $title,
                        'content' => $content,
                        'date' => $_POST['date'],
                        'user_id' => $_SESSION['user']['id'],
                    ]);

                    header('Location: index.php');

                    
                    
            }else{
                die('le formulaire est incomplet');
            }
        }
?>