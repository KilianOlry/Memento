<?php

if (!isset ($_SESSION['user'])) {
    header('Location: login.php');
}
    $id = $_GET['id'];
    
    deletePostIt($id);

    header('Location: index.php')
?>