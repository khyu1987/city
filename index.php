<?php

require 'controllers/MainController.php';

// Підключаємо файли системи
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

//Створюємо об'єкт КОНТРОЛЛЕРА та стартуємо систему
$controllerObject = new MainController();
$controllerObject->run();


?>
