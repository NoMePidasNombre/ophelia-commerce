<?php
$target_dir = "assets/images/Productos imagenes";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "El archivo es una imagen - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "El archivo no es una imagen";
    $uploadOk = 0;
  }
}

// Se fija si ya existe el archivo
if (file_exists($target_file)) {
  echo "El archivo ya existe";
  $uploadOk = 0;
}


// Permite ciertos formatos para insertar
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Lo siento, solo formatos JPG, JPEG y PNG están permitidos";
  $uploadOk = 0;
}

// Si es = 0 es porque hubo un error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// Si todo va bien, sube el archivo
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "el archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " se subió";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>