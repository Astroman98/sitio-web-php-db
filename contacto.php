<?php


    require_once('funciones/funciones_input.php');

    $nombre = test_input( $_POST['nombre'] ?? null );
    $email = test_input( $_POST['email'] ?? null );
    $edad = test_input( $_POST['edad'] ?? null );
    $telefono = test_input( $_POST['telefono'] ?? null );
    $mensaje = test_input( $_POST['mensaje'] ?? null );

    $errores = array();

    if( isset($_POST['submit']) ) {

        if( empty($nombre) ){
            array_push($errores, 'Usted debe ingresar un nombre.');
        }

        if( filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE ){
            array_push($errores, 'Usted debe ingresar un correo electrónico con formato válido.');
        }

        $opciones_edad = array(
            'options' => array(
                'min_range' => 1,
                'max_range' => 120
            )
        );
        
        if( filter_var($edad, FILTER_VALIDATE_INT, $opciones_edad) == FALSE ){
            array_push($errores, 'Usted debe ingresar una edad válida.');
        }

        if(preg_match("/^([0-9]{10})+$/", $telefono)) {

        }else {
            array_push($errores, 'Usted debe ingresar un telefono válido.');
        }

        if( empty($mensaje) ){
            array_push($errores, 'Usted debe ingresar un mensaje.');
        }

        if( count($errores) == 0 ){
            header('Location: resultado_formulario.php');
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contactanos</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />



        <?php require('layout/_css.php') ?>
        <?php require('layout/_js.php') ?>
    </head>
    <body>
        <!-- nav -->
    <?php require('layout/_nav.php') ?>

                <!--  Header-->
                <header class="masthead" style="background-image: url('assets/img/contacto.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contáctanos</h1>
                            <span class="subheading">¿Tenés preguntas? Tenemos respuestas</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">


        <div class="container">

<h1 id="mover"> Formulario </h1>

<ul>
    <?php foreach($errores as $error): ?>
        <li class="text text-danger"> <?php echo $error ?> </li>
    <?php endforeach ?>
</ul>

<form action="contacto.php#mover" method="post">
            <div class="form-group mb-3">
                <label for="nombre"> Nombre </label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" value="<?php echo $nombre ?>">
            </div>

            <div class="form-group mb-3">
                <label for="email"> Email </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electrónico" value="<?php echo $email ?>" >
            </div>

            <div class="form-group mb-3">
                <label for="edad"> Edad  </label>
                <input type="number" min="18" max="115" class="form-control" name="edad" id="edad" placeholder="Ingrese una edad" value="<?php echo $edad ?>">
            </div>

            <div class="form-group mb-3">
                <label for="telefono"> Telefono  </label>
                <input type="number"  class="form-control" name="telefono" id="telefono" placeholder="Ingrese un número de teléfono" value="<?php echo $telefono ?>">
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="novedades">
                <label class="form-check-label" > Quiero recibir novedades de Tentate Food </label>
            </div>


            <div class="form-group mb-3">
                <label for="mensaje"> Mensaje </label>
                <textarea class="form-control" name="mensaje" id="mensaje" rows="3"></textarea>
            </div>
      
            <button type="submit" class="btn btn-primary" name="submit"> Enviar </button>
        </form>

</div>


        </main>
        <!-- Footer-->
        <?php require('layout/_footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
