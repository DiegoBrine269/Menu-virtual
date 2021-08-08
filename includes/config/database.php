<?php
    function conectarDB() : mysqli{
        $db = new mysqli('localhost', 'root', '', 'menuvirtual');
        if(!$db){
            echo "The connection to database failed";
            exit;
        }

        $db->query("SET NAMES 'utf8'");

        return $db;
    }