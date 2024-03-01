<?php

session_start();

require_once './src/imports/class.php';

$db = new DbConnect('memento', 'localhost', 'root', '');

$availablesRoutes = ['homepage', 'login', 'logout', 'register', 'new_post-it', 'delete'];
$route = 'homepage';

if (isset($_GET['page']) && in_array($_GET['page'], $availablesRoutes)) {
    $route = $_GET['page'];
}

require('./public/views/global/base.php');
