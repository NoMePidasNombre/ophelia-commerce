<?php
 require 'userdata.php';

//error_reporting(0);

$mysqli = new mysqli("localhost", "root", "", "db_ophelia");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/Productos imagenes/OpheliaIcon.png" type="image/x-icon">
    <title>Ophelia - Productos</title>

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
                <a class="nav-link" href="index.php">Página Principal
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="products.php">Nuestros Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Sobre Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contáctanos!</a>
              </li>
              <?php
              
              if ($user == ''){
             echo '<li class="nav-item">
              <a id="usuarioIniciado" class="nav-link" href="login.php">Ingresar</a>
              </li>';
            } else if ($user != ''){
              echo '<li class="nav-item">
              <a id="usuarioIniciado" class="nav-link" href="cuenta.php">Cuenta</a>
              </li>';
            }
            
            ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Stock renovado</h4>
              <h2>Productos Ophelia</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="filtros-responsive active" data-filter="*">Todos los productos</li>
                  <li class="filtros-responsive" data-filter=".des">Collares</li>
                  <li class="filtros-responsive" data-filter=".dev">Pulseras</li>
                  <li class="filtros-responsive" data-filter=".gra">Anillos</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid productContainers">

                    <!-- PHP PRODUCTS START -->

                    <?php 
$sql = "SELECT * FROM productos";         
$resultado = mysqli_query($mysqli, $sql);
if ($resultado){
             while($row = $resultado->fetch_array()){
              $titulo = $row['nombre_prod'];
              $precio = $row['precio_prod'];
              $detalle = $row['detalle_prod'];
              $rutaimg = $row['ruta_img'];
              $filtro = $row['id_filtro'];

if ($filtro == 1){
  $filtrar = "";
} else if ($filtro == 2){
  $filtrar = "des";
}else if ($filtro == 3) {
  $filtrar = "dev";
}else if ($filtro == 4){
  $filtrar = "gra";
};
              echo '
              <div class="item col-lg-4 col-md-4 all '.$filtrar . '">
             <div class="product-item">
               <img src="assets/images/Productos imagenes/' . $rutaimg . '" alt="" class="item-image">
               <div class="down-content">
                 <h4 class="item-title">' . $titulo . '</h4>
                 <h6 class="item-price"> ' . $precio . '</h6>
                 <p class="item-detail"> ' . $detalle . '</p>
                 
                 <button onclick="añadidoCarrito()" class="item-button btn btn-primary btn-add addToCart">  Añadir al carrito </button>
               </div>
             </div>
           </div> <br>';
            } 
          }          
?>
                </div>
            </div>
          </div>

          <!-- PHP PRODUCTS END -->
          
          <div class="col-md-12">
           
          </div>
        </div>
      </div>
    </div>

<!-- END SECTION STORE -->
    <!-- START SECTION SHOPPING CART -->

    <section class="shopping-cart">
      <div class="container">
        <hr>
          <h1 class="text-center">CARRITO</h1>
          <hr>
          <div class="row">
              <div class="col-2">
                  <div class="shopping-cart-header text-center">
                      <h6 class="carrito-titulos-responsive">Producto</h6>
                  </div>
              </div>
              <div class="col-4">
                  <div class="shopping-cart-header">
                      <h6 class="carrito-titulos-responsive">Detalle</h6>
                  </div>
              </div>
              <div class="col-2">
                <div class="shopping-cart-header">
                    <h6 class="carrito-titulos-responsive">Precio Individual</h6>
                </div>
              </div>
              <div class="col-4">
                  <div class="shopping-cart-header">
                      <h6 class="carrito-titulos-responsive">Cantidad</h6>
                  </div>
              </div>
          </div>
          <form name="comprarprueba" method="post" action="comprarCarrito.php">
          <div class="shopping-cart-items shoppingCartItemsContainer">
          
          </div>

<!-- END SECTION SHOPPING CART -->
<!-- START SECTION TOTAL -->

<div class="row total-compra">
  
</div>
</form>
<!-- END SECTION TOTAL -->

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2022 Ophelia Accesorios Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="#">MMT Designs Inc.</a></p>
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
<script>
function añadidoCarrito() {
  alert("Producto añadido al carrito!");
}
function comprado(){
  const usuario = document.getElementById('usuarioIniciado');
  if (usuario.innerHTML == 'Cuenta'){
  alert("Gracias por tu pedido!");
} else
alert ("Debes iniciar sesión para realizar un pedido!");
}

</script>

  </body>

</html>
