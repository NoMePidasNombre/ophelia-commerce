<?php
require 'userdata.php';
error_reporting(0);

$mysqli = new mysqli("localhost", "root", "", "db_ophelia");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>
<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/Productos imagenes/OpheliaIcon.png" type="image/x-icon">

    <title>Ophelia</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" <?php  
              if ($user == 'admin' && $pass == 'admin'){
             echo 'href="adminpanel.php"';
            } else if ($user != 'admin'){
              echo 'href="index.php"';
            }
            ?>><h2 class="cursiva">Ophelia <em>Accesorios</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Pagina Principal <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.php">Nuestros productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Sobre nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contáctanos!</a>
              </li>
              <?php
              
              if ($user == ''){
             echo '<li class="nav-item">
              <a class="nav-link" href="login.php">Ingresar</a>
              </li>';
            } else if ($user != ''){
              echo '<li class="nav-item">
              <a class="nav-link" href="cuenta.php">Cuenta</a>
              </li>';
            }
            
            ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Gracias por visitar!</h4>
            <h2>Estamos recibiendo pedidos</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Aprovechá!</h4>
            <h2>Lleva nuestros productos al mejor precio</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Completamente artesanal</h4>
            <h2>Nuestros bienes son de producción propia</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Ingresos recientes 🔥</h2>
              <a href="products.php">Mirá todos los productos <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php 
       $limite = 0;
       $sql = "SELECT * FROM productos ORDER BY `id_prod` DESC";         
       $resultado = mysqli_query($mysqli, $sql);
       
       if ($resultado){
        
                    while($row = $resultado->fetch_array()){
                     $titulo = $row['nombre_prod'];
                     $precio = $row['precio_prod'];
                     $detalle = $row['detalle_prod'];
                     $rutaimg = $row['ruta_img'];
       
                     echo '
                     <div class="item col-lg-4 col-md-4 all">
                    <div class="product-item">
                      <img src="assets/images/Productos imagenes/' . $rutaimg . '" alt="" class="item-image">
                      <div class="down-content">
                        <h4 class="item-title">' . $titulo . '</h4>
                        <h6 class="item-price"> ' . $precio . '</h6>
                        <p class="item-detail"> ' . $detalle . '</p>
                      </div>
                    </div>
                  </div> <br>';
                    $limite++;
                  if($limite == 3){
                    break;
                  } 
                  
                }
              }
?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Acerca de Ophelia</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>¿Querés enterarte de las novedades?</h4>
              <p><a rel="nofollow" href="https://www.instagram.com/_ophelia.accesorios_/?hl=es-la" target="_blank">Esta es nuestra página de Instagram</a>. Seguinos para más info</p>
              <ul class="featured-list">
                <li><a href="contact.php">Podes seguirnos en nuestras redes sociales.</a></li>
                <li><a href="contact.php">¡También encontrar nuestro local!</a></li>
                <li><a href="contact.php">O enviarnos un mensaje privado.</a></li>
                <li><a href="contact.php">Tu duda no molesta</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/Productos imagenes/Ophelia.jpeg" class="redondear" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2022 Ophelia Bijouterie Co., Ltd.
            
            - Diseño: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">MMT Designs.</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/main.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
