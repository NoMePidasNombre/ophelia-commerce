<?php
require 'connection.php';
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$q = "SELECT COUNT(*) as contar from usuarios where nombre_usuario ='$usuario' and contra_usuario ='$clave'";
$consulta = mysqli_query($conexion, $q);

$array = mysqli_fetch_array($consulta);

if ($array['contar']>0){
    $_SESSION['username'] = $usuario;
    $_SESSION['clave'] = $clave;
    

    if($usuario == 'admin'  && $clave == 'admin'){
 header("location: adminpanel.php");
}else{
$_SESSION['username'] = $usuario;
$_SESSION['clave'] = $clave;

header("location: index.php");
}


}else{
    echo'<script type="text/javascript">
    alert("Datos incorrectos!");
    window.location.href="login.php";
    </script>';
}

?>