<?php

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ophelia - Register</title>
    <link rel="shortcut icon" href="assets/images/Login/IconLogin.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    
  </head>

  <div class="select box register">
    <form action="registrarse.php" method="post">
  <h1>Registrarse</h1>
  <input type="text" name="usuario" required="" placeholder="Nombre de usuario">
  <input type="text" name="email" required="" placeholder="Email">
  <input type="password" name="clave" required="" placeholder="Contraseña">
  <input type="password" name="claveconfirm" required="" placeholder="Confirmar contraseña">
  <input type="submit" name="boton" value="Ingresar">

    </form>
    <a href="login.php" style="text-decoration: none; color: white;"><button>Regresar</button></a>
  </div>

  </body>
</html>
