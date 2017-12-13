<?php

class MainController {

    private $mainModel = NULL;

    //Створюємо об'єкт Моделі в конструкторі
    public function __construct() {
        $this->mainModel = new MainModel();
    }

    //Стартуємо тут, перевіряємо ACTION та викликаємо відповідний метод
    public function run() {

        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;

        if (!$action) {
            $this->actionMain();
        } elseif ($action == 'create') {
            $this->actionCreate();
        } elseif ($action == 'show') {
            $this->actionAll();
        } else
        $this->actionMain();

        return true;
    }

    //Показуємо всі міста на карті
    public function actionAll() {
        $resultShow = $this->mainModel->show();
        include 'views/all.php';
    }
    

    //Показуємо стартову сторінку з ІНПУТОМ, 
    public function actionMain() {       
        include 'views/main.php';
    }
    

    //Додаємо нове місто в БД
    public function actionCreate() {

        $city = $_POST['city'];
        $this->mainModel->create($city);

        return true;
        
    }
}
