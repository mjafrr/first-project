<?php

require_once __DIR__ . '/DB/connection.php';
require_once __DIR__ . '/Model/model.php';
require_once __DIR__ . '/Model/Car.php';


$car = new Car();
// $data_mobil = ['name' => 'Ayla', 'model' => 'Daihatsu', 'color' => 'white'];
// $model->create($data_mobil,"cars");

// var_dump($data_mobil = $model->index('cars'));
// $dataMobil = $model->create_data(2, $data_mobil, 'cars');

var_dump($car->all());
var_dump($car->all());
var_dump($car->all());
var_dump($car->all());
var_dump($car->all());
