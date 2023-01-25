<?php

require_once('conf/conf.php');
require_once('funciones/funciones_menu.php');

try{
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
    header('Location: error.php');
}

$comida = $_GET['comida'] ?? null;

$comidas = getMenuByComida($conexion, $comida);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require('layout/_css.php') ?>

    <title>Menu</title>
</head>

<body>

    <div class="container">
    <?php if ($comidas) : ?>

<?php foreach($comidas as $dato): ?>
    


    <div class="card text-center mt-5">
        
    <img class="mx-auto" style="max-width: 80px;" src="assets/img/<?php echo $dato['comida'] ?>.png">
        
        <div class="card-body">
            <h1 class="mb-3 text-center">
            <?php echo $dato['comida'] ?>
            </h1>
            <p class="card-text">
                <li>
                    Tipo: <?php echo $dato['nombre'] ?>
                </li>
                <li>
                    Precio: <?php echo $dato['precio'] ?>
                </li>

            </p>
        </div>
    </div>


    <?php endforeach?>
    <?php else : ?>
        <h1 class="mb-3 text-center">
            Sin resultados
        </h1>
        <div class="alert alert-danger"> No se ha encontrado ninguna comida. </div>
        
    <?php endif ?>
    
    <hr>
    <a class="btn btn-primary" href="menu.php"> Volver </a>
    </div>

    <?php require('layout/_js.php') ?>

</body>

</html>