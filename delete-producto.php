<?php 
require_once('conf/conf.php');
require_once('funciones/funciones_input.php');
require_once('funciones/funciones_consultas.php');


try {
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
    header('Location: error.php');
}

$id = test_input($_GET['id'] ?? null);

deleteMenu($conexion, $id);

header('Location: list-productos.php');

?>