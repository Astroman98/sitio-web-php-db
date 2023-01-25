<?php

require_once('conf/conf.php');
require_once('funciones/funciones_menu.php');
require_once('funciones/funciones_paginador.php');




try {
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
    header('Location: error.php');
}



$menu = getMenu($conexion);


    //Cantidad de menus.
    $cantidad = count($menu);

    //Página actual.
    $pagina_actual = $_GET['pag'] ?? 1;

    //Cuántos registros por página.
    $cuantos_por_pagina = 5;

    //Enlaces del paginado.
    $paginado_enlaces = paginador_enlaces($cantidad, $pagina_actual, $cuantos_por_pagina);

    $menu = paginador_lista($menu, $pagina_actual, $cuantos_por_pagina);


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Menu</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- css y js -->
        <?php require('layout/_css.php') ?>
        <?php require('layout/_js.php') ?>
    </head>
    <body>
<!-- nav -->
<?php require('layout/_nav.php') ?>
        <!--  Header-->
        <header class="masthead" style="background-image: url('assets/img/postt.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>Tenemos la mejor variedad de comidas justo para vos.</h1>
                            <h2 class="subheading">Mira el listado y ordena desde acá</h2>
                            
                        </div>
                    </div>
                </div>
            </div>
            </header>

            <h2 class="section-heading">Listado de menús disponibles</h2>

            <div class="container">

            <form action="menu_success.php" method="get" class="mb-5">
            <div class="mb-3">
                <label for="comida" class="form-label"> Comidas </label>
                <input type="text" class="form-control" name="comida" id="comida" placeholder="Ingrese la comida que desea buscar">
            </div>
            <button type="submit" class="btn btn-primary"> Buscar </button>

            <a href="list-productos.php" class="btn btn-primary">Agregar Menu</a>
        </form>
         

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center"> Comida </th>
                    <th class="text-center"> Nombre </th>
                    <th class="text-center"> Precio </th>
                    <th class="text-center"> Presentacion </th>
                </tr>
            </thead>
            <tbody>

            <?php if (count($menu) > 0) : ?>
                    <?php foreach ($menu as $comidas) : ?>
                        <tr>
                            <td class="text-center">
                            <img src="assets/img/<?php echo $comidas['comida'] ?>.png" alt="" width="40" height="40"> <?php echo "{$comidas['comida']}" ?>
                         </td>
                            <td class="text-center"> <?php echo "{$comidas['nombre']}" ?> </td>
                            
                            <td class="text-center"> $<?php echo number_format($comidas['precio'], 2, ',', '.') ?> </td>

                            
                            <td class="text-center">
                            <img  src="<?php echo $comidas['imagen'] ?>" alt=""  class="presentacion" width="100" height="100" >
                            
                         </td>
                            

                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($paginado_enlaces['anterior']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['primero'] ?>"> Primero </a>                        
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['anterior'] ?>"> <?php echo $paginado_enlaces['anterior'] ?> </a>
                    </li>
                <?php endif ?>
                <li class="page-item active"> 
                    <span class="page-link">
                        <?php echo $paginado_enlaces['actual'] ?> 
                    </span>
                </li>
                <?php if($paginado_enlaces['siguiente']): ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginado_enlaces['siguiente'] ?>"> <?php echo $paginado_enlaces['siguiente'] ?> </a>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['ultimo'] ?>"> Último </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>


    </div>




        <?php require('layout/_footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
