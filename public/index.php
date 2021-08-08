<?php
    require_once __DIR__ . "/../includes/app.php";

    use MVC\Router;
    use Controllers\RestauranteController;

    $router = new Router();
    $router->get('/', [RestauranteController::class, 'index']);

    $router->comprobarRutas();