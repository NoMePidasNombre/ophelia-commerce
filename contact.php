<?php
require 'userdata.php';
error_reporting(0);

$mysqli = new mysqli("localhost", "root", "", "db_ophelia");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
};

$nombre = $_REQUEST['nombre'];
$email = $_REQUEST['email'];
$asunto = $_REQUEST['asunto'];
$mensaje = $_REQUEST['mensaje'];
$boton = $_REQUEST['boton'];


if($boton == 'Enviar!'){
  $sql="INSERT into mensajes (nombre_msg, email_msg, asunto_msg, mensaje_msg) VALUES ('". $nombre ."', '". $email ."' , '". $asunto . "' , '" . $mensaje ."')";
    
  mysqli_query($mysqli, $sql) or die ("error al agregar".$sql);
  echo'<script type="text/javascript">
    alert("Mensaje enviado!");
    window.location.href="contact.php";
    </script>';
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

    <title>Ophelia - Contacto</title>

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
                <a class="nav-link" href="index.php">Página principal
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.php">Nuestros productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Sobre nosotros</a>
              </li>
              <li class="nav-item active">
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
    <div class="page-heading contact-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>¿Querés contactarnos?</h4>
              <h2>Envianos un mensaje o buscanos en:</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Nuestro local</h2>
            </div>
          </div>
          <div class="col-md-8">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14161.515144873778!2d-58.987750568853784!3d-27.45746452633513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94450cef8ff62d0f%3A0x1ced3ed6d65eed1d!2zRS5FLlQuIE7CsDI0ICJTaW3Ds24gZGUgSXJpb25kbyI!5e0!3m2!1ses!2sar!4v1655585083860!5m2!1ses!2sar" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>Puntos de entrega para pedidos</h4>
              <p class="agrandar-texto-contacto">Av. de los Inmigrantes al 300. Domo del Centenario<br><br>Av. Chaco al 1701. Italo Argentino.<br><br>Hipólito Hirigoyen. Plaza 25 de Mayo</p>
              <ul class="social-icons">
                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/home" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/_ophelia.accesorios_/?hl=es-la" target="_blank"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Envianos un mensaje</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="nombre" type="text" class="form-control" id="name" placeholder="Nombre completo" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="Dirección de E-mail" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="asunto" type="text" class="form-control" id="subject" placeholder="Asunto" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="mensaje" rows="6" class="form-control" id="message" placeholder="Escribe tu mensaje..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                    <input type="submit" name="boton" class="btn-primary btn-negrita" value="Enviar!">
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="accordion">
              <li>
                  <a>FAQ</a>
              </li>
              <li>
                  <a>¿De qué métodos de pago disponen?</a>
                  <div class="content">
                      <p class="agrandar-texto-contacto-preguntas">¡Solamente nos manejamos en efectivo! (momentaneamente).</p>
                  </div>
              </li>
              <li>
                  <a>¿Qué dias entregamos pedidos?</a>
                  <div class="content">
                      <p class="agrandar-texto-contacto-preguntas">Entregamos los pedidos de lunes a viernes en horarios a coordinar.</p>
                  </div>
              </li>
              <li>
                  <a>¿Hacen envíos a todo el país?</a>
                  <div class="content">
                      <p class="agrandar-texto-contacto-preguntas">No. Por ahora solo realizamos entregas en Chaco en las localidades de Fontana, Resistencia y Barranqueras.</p>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>



    
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
