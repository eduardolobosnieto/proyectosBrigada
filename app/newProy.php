<?php
require 'config/database.php';
$rut = $_POST['rut'];
$INnombre = $conn->real_escape_string($_POST['nombre']);
$INdescripcion = $conn->real_escape_string($_POST['descripcion']);
$INestado = 2;
$version = 1;


$SQLguardaNew = "INSERT INTO proyecto (id_proyecto ,rut, nombreProyecto, fechaCreacion, estado) VALUES (NULL, $rut, '$INnombre', CURRENT_TIMESTAMP, $INestado);";
$conn->query($SQLguardaNew);

$SQLconsId = "SELECT * FROM proyecto WHERE rut = $rut ORDER BY id_proyecto DESC LIMIT 1;";
$SQLconsultaDatos = $conn->query($SQLconsId);
$dat = mysqli_fetch_array($SQLconsultaDatos);

$IDproy = $dat['id_proyecto'];

$SQLguardaNewDesc = "INSERT INTO descripcionproyecto (id_descripcionProy, id_proyecto, descripcionProyecto,fecha,version) VALUES (NULL, $IDproy, '$INdescripcion', CURRENT_TIMESTAMP, $version);";
$conn->query($SQLguardaNewDesc);

header('Location: tablas.php?rut='.$rut);
?>

