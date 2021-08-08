<?php

    namespace Controllers;
    use MVC\Router;

    class RestauranteController{
        public static function index (Router $router){
            $router->render('layout');
        }
    }
    