<?php
require 'userdata.php';
require 'connection.php';
error_reporting(0);

if ($user == ''){
  header("location: index.php");
}

$asd = "SELECT email_usuario FROM usuarios WHERE nombre_usuario = '". $user . "'";
$query_set = mysqli_query($conexion, $asd); 
$query_true = mysqli_fetch_array($query_set);
$emailposta = $query_true['email_usuario'];

?>
<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/Login/IconLogin.png" type="image/x-icon">

    <title>Cuenta</title>

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
              <li class="nav-item">
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
              echo '<li class="nav-item active">
              <a class="nav-link" href="cuenta.php">Cuenta</a>
              </li>';
            }
            
            ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <br>
    <!-- Page Content Start -->
    

    <!-- Datos usuario Start -->

    <div class="cuenta-box">
    <div class="imagen-box">

        </div>
      <h1 class="titulo-box">Usuario</h1>
      <h2 class="subtitulo-box"><?php echo $user ?></h2>
      
      <h1 class="titulo-box">Email</h1>
      <h2 class="subtitulo-box"><?php echo $emailposta ?></h2>
    
        
   </div>
       

    <!-- Datos usuario End -->
    
    <!-- Mis pedidos Start -->
    <br>
    <section class="send-message">
  <div class="container">
      <div class="pedidos-header">
          <h2 class="pedidos-title">Mis Pedidos</h2>
         <br>
          <hr>
          <div class="row">
              <div class="col-lg-2">
                  <div class="shopping-cart-header text-center">
                      <h6>ID de Pedido</h6>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="shopping-cart-header detalle-pedido">
                      <h6>Detalle</h6>
                  </div>
              </div>
              <div class="col-lg-2">
                <div class="shopping-cart-header">
                    <h6>Precio Total</h6>
                </div>
              </div>
              <div class="col-lg-4">
                  <div class="shopping-cart-header">
                      <h6>Fecha y hora</h6>
                  </div>
              </div>
          </div>
          <hr>

          <div class="shopping-cart-items shoppingCartItemsContainer">
<?php
            $sql = "SELECT * FROM pedidos WHERE usuario_pedido='". $user ."'";         
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado !=''){
                  while($row = $resultado->fetch_array()){
                          $id_pedido =  $row['id_pedido'];
                          $usuario_pedido = $row['usuario_pedido'];
                          $productos_pedido = $row['productos_pedido'];
                          $total_pedido = $row['total_pedido'];
                          $fecha_pedido = $row['fecha_pedido'];
                  
echo '<div>
<div class="row shoppingCartItem">
<div class="col-2">
    <div class="shopping-cart-item">
    <h6 class="shopping-cart-item-title shoppingCartItemTitle cart-title id-pedido">'. $id_pedido .'</h6>
    </div>
</div>
<div class="col-4">
    <div class="shopping-cart-detail">
    <h6 class="shopping-cart-item-title shoppingCartItemTitle cart-title titulo-pedido">'. $usuario_pedido .'</h6>
    <br>    
    <p class="item-detail">'. $productos_pedido .'</p>
    </div>
</div>
<div class="col-2">
    <div class="shopping-cart-price">
        <p class="item-price shoppingCartItemPrice cart-price precio-fecha-bajar">'. $total_pedido .'</p>
    </div>
</div>
<div class="col-4">
    <div
        class="shopping-cart-detail">
        <p class="item_detail cart-price precio-fecha-bajar fecha-margin-left">'. $fecha_pedido .'</p>
    </div>
</div>
</div>
</div>
<hr>';
                  }
                } else {
                echo '<div
                <div class="row shoppingCartItem">
                    <h6> No hay pedidos pendientes! </h6>
                </div>
                </div>';
              }
            ?>
          </div>
            <div>
            </div>
          </div>
          
          </div>
    </section>
   
    <br>

    <!-- Mis pedidos End -->
    <!-- Cerrar sesión Start -->
  
    <div class="cerrar-sesion-container">
<a href="logout.php" class="cerrar-sesion-cuenta">Cerrar Sesión</a>
</div>

    <!-- Cerrar Sesión End -->
    <!-- Page Content End -->

  <!-- Footer empieza -->
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
<!-- Footer Termina -->

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
