<?php
error_reporting(0);
session_start();
$user = $_SESSION['username'];
$pass = $_SESSION['clave'];


function toIndex (){
    header("location: index.php");
}
function toAdmin (){
    header("location: adminpanel.php");
}
?>