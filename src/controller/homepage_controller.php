<?php

if (!isset($_SESSION['user'])){
    header('Location: ?page=login');
    exit();
}
$datas = selectPostItFromUser();

require('./src/views/homepage.php');


?>