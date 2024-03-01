<?php

spl_autoload_register(function ($classe) {
  require_once './src/classes/' . $classe . '.php';
});

require_once './src/classes/Managers/UserManager.php';
require_once './src/classes/Managers/FormControll.php';
require_once './src/classes/Managers/PostitManager.php';
