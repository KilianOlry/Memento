<?php

    session_start();
    
    require ('./src/models/connexion.php');
    require ('./src/models/data/functions.php');
    require ('./src/models/data/functions_input.php');


    $availablesRoutes = ['homepage', 'login', 'logout', 'register', 'new_post-it', 'delete'];
    $route = 'homepage';

    if (isset($_GET['page']) && in_array($_GET['page'],$availablesRoutes)) {
        $route = $_GET['page'];
    }
    
    require ('./src/views/global/base.php');

?>
