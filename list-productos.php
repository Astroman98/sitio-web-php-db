<?php 

require_once('conf/conf.php');
require_once('funciones/funciones_consultas.php');

try {
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
    header('Location: error.php');
}

$menus = getMenus($conexion);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lista de Menús</title>
    <?php require('layout/_csscrud.php') ?>
</head>

<body>
    <?php require('layout/_navcrud.php') ?>
    <div id="layoutSidenav">
        <?php require('layout/_layout_navcrud.php') ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4"> Lista de Menús </h1>

                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-list me-1"></i>
                        </div>

                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"> Nombre </th>
                                        <th scope="col"> Precio </th>
                                        <th scope="col"> Comida </th>
                                        <th scope="col"> </th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php foreach($menus as $men): ?>
                                        <tr>
                                            <td> <?php echo $men['nombre'] ?> </td>
                                            <td> $<?php echo number_format($men['precio'], 2, ',', '.') ?> </td>
                                            <td> <?php echo $men['comida'] ?> </td>
                                        
                                        <td>
                                            <a class="text text-success" href="update-producto.php?id=<?php echo $men['id']?> ">Editar</a>
                                            <a class="text text-danger" href="delete-producto.php?id=<?php echo $men['id']?>">Eliminar</a>
                                        </td>
                                        
                                        </tr>

                                    <?php endforeach ?>


                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </main>
            <?php require('layout/_footercrud.php') ?>
        </div>
    </div>
    <?php require('layout/_jscrud.php') ?>
    <script src="<?php echo BASE_URL ?>js/productos/list-productos.js"></script>
</body>

</html>