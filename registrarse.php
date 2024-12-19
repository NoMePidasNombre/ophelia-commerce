<?php
require 'connection.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$claveconfirm = $_POST['claveconfirm'];
$email = $_POST['email'];

$usuario = trim($usuario);
$clave = trim($clave);
$claveconfirm = trim($claveconfirm);
$email = trim($email);


if ($usuario != ""){
 if ($clave != ""){
  if ($email != ""){

if ($clave == $claveconfirm){
    $sql = "SELECT * FROM usuarios";         
    $resultado = mysqli_query($conexion, $sql);
             while($row = $resultado->fetch_array()){
              $nombre = $row['nombre_usuario'];
              if ($usuario == $nombre){
                $duplicado = 1;
              }
} 

  if ($duplicado == 1){
    echo'<script type="text/javascript">
alert("Ya existe un usuario con ese nombre!");
window.location.href="register.php";
</script>';
  } else{
    $sql = "INSERT into usuarios (nombre_usuario, contra_usuario, email_usuario) VALUES ('". $usuario ."', '". $clave ."' , '". $email . "')";
    $consulta = mysqli_query($conexion, $sql);


    echo'<script type="text/javascript">
    alert("Usuario Registrado Correctamente!");
    window.location.href="register.php";
    </script>';
    header("location: login.php");
 }
 
} else {
    echo'<script type="text/javascript">
    alert("Las claves no coinciden!");
    window.location.href="register.php";
    </script>';
    header("location: register.php");
}
} else {
  echo'<script type="text/javascript">
    alert("Hay campos vacios!");
    window.location.href="register.php";
    </script>';
    header("location: register.php");
}
} else {
  echo'<script type="text/javascript">
    alert("Hay campos vacios!");
    window.location.href="register.php";
    </script>';
    header("location: register.php");
}
} else {
  echo'<script type="text/javascript">
    alert("Hay campos vacios!");
    window.location.href="register.php";
    </script>';
    header("location: register.php");
}

?>