<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tentate Food</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        


        <!-- css y js -->
        <?php require('layout/_css.php') ?>
        <?php require('layout/_js.php') ?>
    </head>
    <body>


         
        <!-- nav -->
         <?php require('layout/_nav.php') ?>


        <!--  Header-->
        <header class="masthead" style="background-image: url('assets/img/1he.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>¡Pedi lo que quieras!</h1>
                            <span class="subheading">¿Con hambre? Podemos solucionarlo</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
                
        <!-- contenido -->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!--  preview-->
                    <div class="post-preview">
                        <a href="#!">
                            <h2 class="post-title">Pedí por delivery</h2>
                            <h3 class="post-subtitle">Podes pedir tu comida y bebida favorita donde sea que estés</h3>
                        </a>
                        
                    </div>
                    
                    <hr class="my-4" />
                    <!--  preview-->
                    <div class="post-preview">
                        <a href="menu.php"><h2 class="post-title">Mirá nuestro menú</h2></a>
                        <p class="post-meta">
                            Tenemos 
                            <a href="menu.php"> diferentes variedades </a>
                            de comida para sacarte el hambre
                        </p>
                    </div>
                    
                    <hr class="my-4" />
                    <!--  preview-->
                    <div class="post-preview">
                        <a href="#!">
                            <h2 class="post-title">Nuestras sucursales</h2>
                            <h3 class="post-subtitle">Estamos en Palermo, Caballito, Belgrano, Recoleta, Microcentro</h3>
                        </a>
                        
                    </div>
                    
                    <hr class="my-4" />
                    <!-- preview-->
                    <div class="post-preview">
                        <a href="#!">
                            <h2 class="post-title">Promociones de fin de semana</h2>

                        </a>
                        <p class="post-meta">
                            Mirá 
                            <a href="#!"> nuestras promos </a>
                            de más de un 50% de descuento!
                            
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Más noticias →</a></div>
                </div>
            </div>
        </div>
        <?php require('layout/_footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
