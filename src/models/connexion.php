<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'memento');


try
{
    $bdd = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASSWORD);

    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

?>