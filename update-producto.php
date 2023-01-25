<?php 

require_once('conf/conf.php');
require_once('funciones/funciones_input.php');
require_once('funciones/funciones_consultas.php');

try {
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
    header('Location: error.php');
}

$id = test_input( $_REQUEST['id'] ?? null );

$menu = getMenusById($conexion, $id);


$nombre = test_input( $_POST['nombre'] ?? $menu['nombre'] );
$precio = test_input( $_POST['precio'] ?? $menu['precio'] );
$comida = test_input( $_POST['comida'] ?? $menu['comida'] );
$imagen = $_FILES['imagen'] ?? null;

$errores = array();


$comidas = getComidas($conexion);


if (isset($_POST['submit'])) {
    
    //Validaciones
    if(empty($nombre)) {
        array_push($errores, 'Usted debe ingresar un nombre.');
    }

    if( !filter_var($precio, FILTER_VALIDATE_INT) ) {
        array_push($errores, 'Usted debe ingresar un precio con un formato valido.');
    }

    if(empty($comida)) {
        array_push($errores, 'Usted debe ingresar una comida.');
    }

    $imagen_path = $menu['imagen'];

    
    
    if ($imagen['error'] == '0') {
        
         $extensiones_permitidas = array('jpg', 'gif', 'png');
         $info = pathinfo($imagen['name']);
         $extension = $info['extension'];

         if ( !in_array($extension, $extensiones_permitidas)) {
            array_push($errores, 'Usted debe cargar una imagen con un formato valido');
         }


    }

    if( count($errores) == 0) {

        if ($imagen['error'] == '0') { 
            $imagen_path = 'assets/img/' . time() . $imagen['name'];

            move_uploaded_file($imagen['tmp_name'], $imagen_path);
            unlink($menu['imagen']);
        }



        updateMenu($conexion, $id, array(
            'nombre' => $nombre,
            'precio' => $precio,
            'comida' => $comida,
            'imagen' => $imagen_path

        ));



        header('Location: list-productos.php');

    }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> <?php echo $menu['nombre']?> </title>
    <?php require('layout/_csscrud.php') ?>
</head>

<body>
    <?php require('layout/_navcrud.php') ?>
    <div id="layoutSidenav">
        <?php require('layout/_layout_navcrud.php') ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <h1 class="mt-4"> <?php echo $menu['nombre']?> </h1>

                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-plus me-1"></i>
                        </div>

                        <div class="card-body">

                        <ul>
                                <?php foreach($errores as $error): ?>
                                    <li class="text text-danger"> <?php echo $error ?> </li>
                                <?php endforeach ?>
                            </ul>

                            <form class="m-3" method="post" action="update-producto.php" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label"> Nombre </label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" value="<?php echo $nombre ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label"> Precio </label>
                                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del producto" value="<?php echo $precio ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="comida" class="form-label"> Comida </label>
                                    <select class="form-control" name="comida" id="comida">
                                        <option value=""> Seleccione el tipo de Comida </option>
                                        <?php foreach($comidas as $cat): ?>
                                            <option <?php if($cat['comida'] == $comida): ?>  selected <?php endif ?>  value="<?php  echo $cat['comida'] ?>"> <?php echo $cat['comida'] ?>  </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="imagen" class="form-label"> Imagen </label>
                                    <input type="file" class="form-control" id="imagen" name="imagen">
                                </div>
                                <input type="hidden" name="id" value= " <?php echo $id ?> ">
                                <button type="submit" class="btn btn-success" name="submit"> Modificar </button>
                                <a class="btn btn-danger" href="<?php echo BASE_URL ?>list-productos.php"> Cancelar </a>
                            </form>
                        </div>

                    </div>

                </div>
            </main>
            <?php require('layout/_footercrud.php') ?>
        </div>
    </div>
    <?php require('layout/_jscrud.php') ?>
</body>

</html>