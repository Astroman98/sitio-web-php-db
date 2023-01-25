<?php 

function getComidas(PDO $conexion) 
{
    $consulta = $conexion->prepare('
        SELECT DISTINCT comida
        FROM menu
    ');
    $consulta->execute();
    $comidas = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $comidas;
}

function addMenu(PDO $conexion, $data){


    $consulta = $conexion->prepare('
        INSERT INTO menu(nombre, precio, comida, imagen)
        VALUES(:nombre, :precio, :comida, :imagen)
    ');
    $consulta->bindValue(':nombre', $data['nombre']);
    $consulta->bindValue(':precio', $data['precio']);
    $consulta->bindValue(':comida', $data['comida']);
    $consulta->bindValue(':imagen', $data['imagen']);
    $consulta->execute();
}

function getMenus(PDO $conexion) {
    $consulta = $conexion->prepare('
    SELECT id, comida, nombre, precio, imagen
    FROM menu
    ');
    $consulta->execute();
    $menus = $consulta ->fetchAll(PDO::FETCH_ASSOC);
    return $menus;
}

function getMenusById(PDO $conexion, $id) {
    $consulta = $conexion->prepare('
    SELECT id, nombre, precio, comida, imagen
    FROM menu
    WHERE id = :id
    ');
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    $menus = $consulta ->fetch(PDO::FETCH_ASSOC);
    return $menus;
}


function updateMenu(PDO $conexion, $id, $data)
{
    $consulta = $conexion->prepare('
    UPDATE menu
    SET
        nombre = :nombre,
        precio = :precio,
        comida = :comida,
        imagen = :imagen
    WHERE id = :id
    ');
    $consulta->bindValue(':nombre', $data['nombre']);
    $consulta->bindValue(':precio', $data['precio']);
    $consulta->bindValue(':comida', $data['comida']);
    $consulta->bindValue(':imagen', $data['imagen']);
    $consulta->bindValue(':id', $id);
    $consulta->execute();
}

function deleteMenu(PDO $conexion, $id) {
    $consulta = $conexion->prepare('
    DELETE FROM menu
    WHERE id = :id
    ');
    $consulta->bindValue(':id', $id);
    $consulta->execute();
}

?>