<?php
require 'app/config/database.php';
$rut = $_POST['ruuu'];
//print_r($ruuu);



$sqlUsser = "SELECT * FROM usuarios WHERE rut = $rut";
$usuario = $conn->query($sqlUsser);


if($usuario->num_rows != 0){
//SI existe
header('Location: app/index.php?rut='.$rut);
}else{
    //NO Existe

    header('Location: app/ingrUsser.php?rut='.$rut);

    
}

?>