<?php
require 'config/database.php';
$ruuu = $_POST['ruuu'];
$clae = $_POST['clae'];

$comprobar = "SELECT * FROM usuarios WHERE rut=$ruuu && clae= $clae;";
$ingSys = $conn->query($comprobar);

if($ingSys->num_rows != 0){
    header('Location: tablas.php?rut='.$ruuu);
}else{
    header('Location: index.php');
}

?>