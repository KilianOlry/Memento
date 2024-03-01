<?php
if (empty($_SESSION['user'])) {
    header('Location: ?page=login');
    exit();
}
$postIt = new PostItManager();

$datas = $postIt->selectAllPostIt($_SESSION['user']['id'], $db->getPdo());

require('./public/views/homepage.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    if (number_format($id)) {
        $deleteOne = $postIt->deleteOne($_SESSION['user']['id'], $id, $db->getPdo());

        $_SESSION['status'] = 'success';
        $_SESSION['message'] = "Post it supprimer !!";

    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = "Le post it n'a pas pu être supprimer";
    }
}
