<?php
$server = "localhost";
$usuario = "root";
$pass = "";
$database ="proyectos";

$conn = new mysqli($server,$usuario,$pass,$database);
$conn->set_charset("utf8");


if ($conn->connect_error) {
    die("Error de conexion" . $conn->connect_error);
}

?>