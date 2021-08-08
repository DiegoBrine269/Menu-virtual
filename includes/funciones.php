<?php
    define('FUNCIONES_URL', __DIR__ . '/funciones');

    function debug($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }

    //Valida que el atributo dado en el GET sea un número entero, de no ser así, redirecciona
    function validarGET($key, string $url){
        $valido = filter_var($key, FILTER_VALIDATE_INT);

        if(!$valido){
            header('Location: ' . $url);
        }

        return $valido;
    }

    //Escapa (Sanitizes) HTML
    function s($html){
        return htmlspecialchars($html);
    }