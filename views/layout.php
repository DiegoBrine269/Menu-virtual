<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú virtual</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Pacifico&family=Style+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="contenedor header">
        <img src="/imagenes/El Rincón Enchilado.png" alt="">
        <h1>El Rincón Enchilado</h1>
    </header>
    <nav>
        <ul>
            <li><button class="selected">Desayunos</button></li>
            <li><button>Entradas</button></li>
            <li><button>Comida</button></li>
            <li><button>Bebidas</button></li>
            <li><button>Postres</button></li>
        </ul>
    </nav>

    <div class="app contenedor">
        <div class="producto">
            <img src="/imagenes/huevos.png" alt="">
            <div class="info">
                <h2>Huevos al gusto</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus in deleniti eaque, consectetur ullam quia?</p>
                <p class="precio">$35</p>
            </div>
        </div>
    </div>
</body>
</html>