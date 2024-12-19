<?php


error_reporting(0);
require 'userdata.php';

if ($user != 'admin' && $pass != 'admin'){
  header("location: index.php");
}

$mysqli = new mysqli("localhost", "root", "", "db_ophelia");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;


}

$boton = $_REQUEST['boton'];
$titulo = $_REQUEST['titulo'];
$idpedidoBorrar = $_REQUEST['idpedidoBorrar'];
$idmensajeBorrar = $_REQUEST['idMensajeBorrar'];
$precio = $_REQUEST['precio'];
$descrip = $_REQUEST['descrip'];

$filtro =$_REQUEST['filtro'];

if ($boton == "Borrar Pedido"){
  $sql="DELETE FROM pedidos WHERE id_pedido = " . $idpedidoBorrar . "";
  mysqli_query($mysqli, $sql) or die ("error al borrar");

}

if ($boton == "Borrar Mensaje"){
  $sql="DELETE FROM mensajes WHERE id_msg = " . $idmensajeBorrar . "";
  mysqli_query($mysqli, $sql) or die ("error al borrar");

}


if($boton == "Crear"){
  $filename = $_FILES["imageninsertar"]["name"];
  $tempname = $_FILES["imageninsertar"]["tmp_name"];
  $folder = "assets/images/Productos imagenes/" . $filename;
  if(file_exists($filename)){
unlink($filename);
move_uploaded_file($tempname, $folder);
  } else {
  move_uploaded_file($tempname, $folder);
}

$sql = "SELECT * FROM productos WHERE nombre_prod = '". $titulo . "'";
              $query_set = mysqli_query($mysqli, $sql);
              if  (mysqli_num_rows($query_set) == 0){
                  
                $sql="INSERT into productos (nombre_prod, precio_prod, detalle_prod, ruta_img, id_filtro) VALUES ('". $titulo ."', '". $precio ."$' , '". $descrip . "' , '" . $filename ."', " . $filtro .")";
                
                mysqli_query($mysqli, $sql) or die ("error al agregar".$sql);

              }else{
                  
                  echo'<script type="text/javascript">
                  alert("Ya existe un producto con ese nombre!");
                  window.location.href="adminpanel.php";
                  </script>';
              }


  
  
  
  }else
  if ($boton == "Borrar"){
  $sql="DELETE FROM productos WHERE nombre_prod = '" . $titulo . "'";
  mysqli_query($mysqli, $sql) or die ("error al borrar");
  
  

  
  }else
  if ($boton == "Modificar"){

    $filename = $_FILES["imageninsertar"]["name"];
  $tempname = $_FILES["imageninsertar"]["tmp_name"];
  $folder = "assets/images/Productos imagenes/" . $filename;
  if(file_exists($filename)){
unlink($filename);
move_uploaded_file($tempname, $folder);
  } else if ($tempname = $_FILES["imageninsertar"]["tmp_name"] == ''){
  $filename = $_REQUEST['img'];
}
  $sql = "UPDATE productos SET detalle_prod ='" . $descrip . "', precio_prod ='" . $precio. "$', ruta_img ='" . $filename . "', id_filtro =" . $filtro . " WHERE nombre_prod = '" . $titulo . "'";
  mysqli_query($mysqli, $sql) or die ("error al modificar" .$sql);
  
  }else
  if ($boton == "Buscar"){
              $sql = "SELECT * FROM productos WHERE nombre_prod = '". $titulo . "'";
              $query_set = mysqli_query($mysqli, $sql);
              if  (mysqli_num_rows($query_set) == 0){
                  echo "No encontro";
              }else{
                  $query_true = mysqli_fetch_array($query_set);
                  $precio = $query_true['precio_prod'];
                  $precio = rtrim($precio, '$');
                  $descrip = $query_true['detalle_prod'];
                  $rutaimg = $query_true['ruta_img'];
                  $filtro = $query_true['id_filtro'];
              }
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

    <title>Ophelia - Panel de Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

  <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> 
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
                <a class="nav-link active" href="index.php">Página principal
                  <span class="sr-only">(current)</span>
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
    <div class="page-heading admin-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Panel de control</h4>
              <h2>Controles de Admin</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Parte Panel de Admin INICIO -->

    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Panel de productos</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
              <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="titulo" type="text" class="form-control bordear" id="nombre" placeholder="Nombre del producto" value="<?php echo $titulo?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="precio" type="number" class="form-control" id="price" placeholder="Precio del producto" value="<?php echo $precio?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                      <input name="img" type="text" readonly class="form-control" id="img" placeholder="Aquí aparece el nombre de la imagen guardada" value="<?php echo $rutaimg?>">
                    </fieldset> 
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="descrip" rows="6" class="form-control" id="descrip" placeholder="Descripcion del producto"><?php echo $descrip?></textarea>
                    </fieldset>
                    </div>
                    <div class="col-lg-3 filtro-style">
                      <p class="filtro-centro">Filtro</p>
    </div>
                    <div class="col-lg-3 filtro-style">
    <select name="filtro">
    <?php $sql = "SELECT * FROM filtros";
    $eje = mysqli_query($mysqli, $sql);
    while ($dato = mysqli_fetch_array($eje)) {
     ?>
     <option value="
     <?php echo $dato['id_filtro'];?>"
    <?php if ($query_true['id_filtro'] == $dato['id_filtro']){
        echo "selected"; }?>>
 <?php
 echo $dato['nom_filtro'];
    ?>
    
    <?php  } ?>

    </select>
    </div>
    <div class="col-lg-3 filtro-style">
      <p class="filtro-centro">Insertar imagen</p>
    </div>
    <div class="col-lg-3">
      <input type="file" name="imageninsertar" id="">
    </div>
                  <div class="col-lg-3">
                    <fieldset>
                    <input type="submit" name="boton" class="btn-primary btn-negrita" value="Crear">
                    </fieldset>
                    </div>
                    <div class="col-lg-3">
                    <fieldset>
                    <input type="submit" name="boton" class="btn-primary btn-negrita" value="Modificar">
                    </fieldset>
                    </div>
                    <div class="col-lg-3">
                    <fieldset>
                    <input type="submit" name="boton" class="btn-primary btn-negrita" value="Buscar">
                    </fieldset>
                    </div>
                    <div class="col-lg-3">
                    <fieldset>
                    <input type="submit" name="boton" class="btn-primary btn-negrita" value="Borrar">
                    </fieldset>
                    </div>
                </div>
              </form>
            </div>
          </div>

          </div>
          </div>
          </div>
    <!-- Parte Panel de Admin FIN -->


 <br> 
 <section class="send-message">
  <div class="container">
      <div class="pedidos-header">
          <h2 class="pedidos-title">Mensajes</h2>
         <br>
          <hr>
          <div class="row">
              <div class="col-lg-2">
                  <div class="shopping-cart-header text-center">
                      <h6 class="h6-responsive-mensajes">Nombre e ID</h6>
                  </div>
              </div>
              <div class="col-lg-2">
                  <div class="shopping-cart-header detalle-pedido">
                      <h6 class="h6-responsive-mensajes">Asunto</h6>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="shopping-cart-header">
                    <h6 class="h6-responsive-mensajes">Detalle</h6>
                </div>
              </div>
              <div class="col-lg-4">
                  <div class="shopping-cart-header">
                      <h6 class="h6-responsive-mensajes">Email</h6>
                  </div>
              </div>
          </div>
          <hr>

          <div class="shopping-cart-items shoppingCartItemsContainer">
<?php
            $sql = "SELECT * FROM mensajes";         
            $resultado = mysqli_query($mysqli, $sql);
            if ($resultado){
                  while($row = $resultado->fetch_array()){
                    $id_mensaje = $row['id_msg'];
                    $nombre = $row['nombre_msg'];
                    $email = $row['email_msg'];
                    $asunto = $row['asunto_msg'];
                    $texto = $row['mensaje_msg'];
                          
                  
echo '<div>
<div class="row shoppingCartItem">
<div class="col-2">
    <div class="shopping-cart-item">
    <h6 class="shopping-cart-item-title shoppingCartItemTitle cart-title id-pedido">'. $nombre .'</h6>
    <br>
    <h6 class="shopping-cart-item-title shoppingCartItemTitle cart-title id-pedido">ID: '. $id_mensaje .'</h6>
    </div>
</div>
<div class="col-2">
    <div class="shopping-cart-detail">
    <h6 class="titulo-pedidos-responsive shopping-cart-item-title shoppingCartItemTitle cart-title titulo-pedido">'. $usuario_pedido .'</h6>
    <br>
    <h6 class="titulo-pedidos-responsive shopping-cart-item-title shoppingCartItemTitle cart-title titulo-pedido">'. $email_usuario .'</h6>
    <br>
        <p class="item-detail">'. $asunto .'</p>
    </div>
</div>
<div class="col-4">
    <div class="shopping-cart-price">
        <p class="item-price shoppingCartItemPrice cart-price precio-fecha-bajar">'. $texto .'</p>
    </div>
</div>
<div class="col-4">
    <div
        class="shopping-cart-detail">
        <p class="item_detail cart-price precio-fecha-bajar fecha-margin-left">'. $email .'</p>
    </div>
</div>
</div>
</div>
<hr>';
                  }
                } else {
                echo '<div
                <div class="row shoppingCartItem">
                    <h6> No hay mensajes nuevos! </h6>
                </div>
                </div>';
              }
            ?>
          </div>
            <div>
            <div class="row mensaje-borrar">
                      <div class="col-6">
            <form method="POST" action="">
                    <fieldset>
                      <input name="idMensajeBorrar" type="number" class="form-control input-borrar-responsive" id="idMensajeBorrar" placeholder="Ingrese la ID del mensaje a borrar" value="<?php echo $idmensajeBorrar?>">
                      </fieldset>
                      </div>
                <div class="col-6">           
                      <fieldset>
                      <input type="submit" name="boton" class="btn-primary btn-negrita btn-agrandar btn-borrar-mensajes" value="Borrar Mensaje">
                    </fieldset>
                    </form>
                </div>
              </div>
              </div>
          </div>
    </section>



<!-- PEDIDOS START -->
<section class="send-message">
  <div class="container">
      <div class="pedidos-header">
          <h2 class="pedidos-title">Pedidos</h2>
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
            $sql = "SELECT * FROM pedidos";         
            $resultado = mysqli_query($mysqli, $sql);
            if ($resultado){
                  while($row = $resultado->fetch_array()){
                          $id_pedido =  $row['id_pedido'];
                          $usuario_pedido = $row['usuario_pedido'];
                          $email_usuario = $row['email_pedido'];
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
    <h6 class="titulo-pedidos-responsive shopping-cart-item-title shoppingCartItemTitle cart-title titulo-pedido">'. $usuario_pedido .'</h6>
    <br>
    <h6 class="titulo-pedidos-responsive shopping-cart-item-title shoppingCartItemTitle cart-title titulo-pedido">'. $email_usuario .'</h6>
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
          <div class="row">
                      <div class="col-6">
            <form method="POST" action="">
                    <fieldset>
                      <input name="idpedidoBorrar" type="number" class="form-control pedidos-input" id="idpedidoBorrar" placeholder="Ingrese la ID del pedido a borrar" value="<?php echo $idpedidoBorrar?>">
                      </fieldset>
                      </div>
                <div class="col-6">           
                      <fieldset>
                      <input type="submit" name="boton" class="btn-primary btn-negrita btn-agrandar-pedido" value="Borrar Pedido">
                    </fieldset>
                    </form>
                </div>
              </div>
            </div>
          </div>
          
          </div>
    </section>
<!-- PEDIDOS FIN -->

<!-- Parte Footer START -->
    
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

<!-- Parte Footer END -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


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
