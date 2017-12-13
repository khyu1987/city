<?php

class MainModel {

    //Записуємо до БД дані про місто
    public function create($city) {
        $pdo = Db::openDb();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO city (city) VALUES (:city)";

        $query = $pdo->prepare($sql);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->execute();

        Db::closeDb();
    }

    

    //Показуємо всі міста в БД
    public function show() {
        $pdo = Db::openDb();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM city ORDER BY id DESC";

        $query = $pdo->prepare($sql);
        $query->execute();

        $i = 0;
        $items = array();
        while ($row = $query->fetch()) {
            $items[$i]['id'] = $row['id'];
            $items[$i]['city'] = $row['city'];
            $i++;
        }

        Db::closeDb();
        return $items;
    }
    
    

}
