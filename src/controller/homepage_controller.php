<?php

if (!isset($_SESSION['user'])) {
    header('Location: ?page=login');
    exit();
}
$datas = selectPostItFromUser();

require('./public/views/homepage.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    if (number_format($id)) {

        deletePostIt($id, $_SESSION['user']['id']);

        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Post it supprimer !!"; 
    }else{
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Le post it n'a pas pu être supprimer"; 
    }
}
