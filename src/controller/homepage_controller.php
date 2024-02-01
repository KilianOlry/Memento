<?php

if (!isset($_SESSION['user'])){
    header('Location: ?page=login');
    exit();
}
$datas = selectPostItFromUser();

require('./public/views/homepage.php');


?>