<?php

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ophelia- Login</title>
    <link rel="shortcut icon" href="assets/images/Login/IconLogin.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    
  </head>

  <body>
  <div class="selectdos box logclick">
    <form action="loguear.php" method="post">
  <h1>Iniciar Sesión</h1>
  <input type="text" name="usuario" required="" placeholder="Nombre de usuario">
  <input type="password" name="clave" required="" placeholder="Contraseña">
  <input type="submit" name="boton" value="Ingresar">

    </form>
    <a href="products.php" style="text-decoration: none; color: white;"><button>Regresar</button></a>
    <a href="register.php" style="text-decoration: none; color: white;"><button>Registrarse</button></a>
  </div>


  </body>
</html>
