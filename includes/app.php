<?php
    require_once 'funciones.php';
    require 'config/database.php';
    require __DIR__ . '/../vendor/autoload.php';

    //Nos conectamos a la BD
    $db = conectarDB();

    use Models\ActiveRecord;
    ActiveRecord::setDB($db);