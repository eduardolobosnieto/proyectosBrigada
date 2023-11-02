<?php
require 'config/database.php';
$idproy = $_POST['id_proyecto'];
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$version = ($_POST['version']+1);
$rut = $_POST['rut'];
$descripcion_old = $_POST['descripcion_old'];
$str_old = mb_strtolower($descripcion_old);
$str_new = mb_strtolower($descripcion);



if(!strcmp($str_old, $str_new) == 0){
    $SQLguardamodif = "INSERT INTO descripcionproyecto (id_descripcionProy,id_proyecto,descripcionproyecto,fecha,version) VALUES (NULL, $idproy, '$descripcion', CURRENT_TIMESTAMP, $version)";
    $conn->query($SQLguardamodif);
    header('Location: tablas.php?rut='.$rut);
}
else{
    echo "<p>sdad</p>";
    header('Location: tablas.php?rut='.$rut.'&save=1');
}



?>