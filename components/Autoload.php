<?php

function __autoload($class_name)
{
    //Масив папок для пошуку класів
    $array_paths = array(
        '/models/',
        '/components/'
    );
    
    //Шукаємо класи в папках
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}

