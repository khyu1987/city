<?php

class Db {
    
        //Параметри підключення до БД
    private static $dbName = 'testphp';
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $flag = null;

        //Відкриття з'єднання з БД
    public static function openDb() {
        if (null == self::$flag) {
            try {
                self::$flag = new PDO("mysql:host=" . self::$host . ";" . "dbname=" .
                        self::$dbName, self::$user, self::$password);
                self::$flag->exec("set names utf8");
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$flag;
    }
       //Закриття з'єднання з БД
    public static function closeDb() {
        self::$flag = null;
    }

}
