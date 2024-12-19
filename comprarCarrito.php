<?php
require 'connection.php';
require 'userdata.php';

$boton = $_POST['boton'];
$productos_pedido = '';
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fecha_pedido = date('m-d-Y h:i:s a');

if ($boton == 'Comprar'){
    if ($user != '') {
    $titulosPhp = $_POST['titulosPhp'];
    $cantidadesPhp = $_POST['cantidadesPhp'];
    $valorTotal = $_POST['totalPhp'];
    $asd = "SELECT email_usuario FROM usuarios WHERE nombre_usuario = '". $user . "'";
    $query_set = mysqli_query($conexion, $asd); 
    $query_true = mysqli_fetch_array($query_set);
    $emailposta = $query_true['email_usuario'];

    for ($i = 0, $tamaño = count($titulosPhp); $i< $tamaño; ++$i) {
      $productos_pedido = $productos_pedido . $titulosPhp[$i] . " x" .$cantidadesPhp[$i] . " "; 
    }
    echo `<script type="text/javascript"> alert("Gracias por su pedido c:"); </script>`;
  $sql="INSERT into pedidos (usuario_pedido, productos_pedido, total_pedido, fecha_pedido, email_pedido) VALUES ('". $user ."', '". $productos_pedido ."' , '". $valorTotal . "', '" . $fecha_pedido ."', '". $emailposta ."')";
  mysqli_query($conexion, $sql) or die ("error al agregar".$sql);
  
  echo `<script type="text/javascript">
      shoppingCartItemsContainer.innerHTML = ''; //Al apretar "Comprar" se vacía el carrito y comienza una nueva compra
    updateShoppingCartTotal();
    totalContainer.innerHTML = '';
      </script>`;
      header("location: products.php");
  } else {
    echo `<script type="text/javascript"> 
    alert("Debes iniciar sesión para hacer un pedido!"); 
    window.location.href="products.php";
    </script>`;
    header("location: products.php");
   }
  }

?>