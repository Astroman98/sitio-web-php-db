<?php 

function getMenu(PDO $conexion) {

    $consulta = $conexion->prepare('
        SELECT id, comida, nombre, precio, imagen
        FROM menu
    ');

    $consulta->execute();

    $menu = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $menu;

}

function getMenuByComida(PDO $conexion, $comida)
{

    $consulta = $conexion->prepare('
        SELECT id, comida, nombre, precio, imagen
        FROM menu
        WHERE comida = :comida
        
    ');

    $consulta->bindValue(':comida', $comida);

    $consulta->execute();

    $menu = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $menu;

}


?>