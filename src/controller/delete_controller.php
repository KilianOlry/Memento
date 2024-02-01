<?php

    $id = $_POST['id'];
    if (number_format($id)) {
        deletePostIt($id);
    }

    header('Location: index.php');
?>