<?php

use CRUD\Controller\PersonController;

//include ("loader.php");
//
//$controller = new PersonController();
//$controller->switcher($_SERVER['REQUEST_URI'],$_REQUEST);

try {
    $connection = new PDO("mysql:host=localhost;dbname=person_crud","root", "1234");
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}