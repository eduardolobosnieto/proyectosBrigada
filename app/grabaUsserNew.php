<?php
require 'config/database.php';
    $GNUrut = $_POST['rut'];
    $GNUdv = $_POST['dv'];
    $GNUnombre = $_POST['nombre'];
    $GNUapp = $_POST['app'];
    $GNUapm = $_POST['apm'];
    $GNUgrado = $_POST['grado'];
    $GNUunidad = $_POST['unidad'];
    $GNUanexo = $_POST['anexo'];
    $GNUclae = $_POST['clae'];
    $GNUtpo = 3;

    $sqlDatosPersonal = "INSERT INTO datospersonal (rut, grado, unidad, anexo) VALUES ('$GNUrut', '$GNUgrado', '$GNUunidad', '$GNUanexo');";
    $grabaDatosPersonal = mysqli_query($conn,$sqlDatosPersonal);
    if ($grabaDatosPersonal){
        $sqlDatosUsuarios = "INSERT INTO usuarios (id_usuario, rut, clae, tipo, ok) VALUES (NULL, '$GNUrut', '$GNUclae', '$GNUtpo', CURRENT_TIMESTAMP);";
        $grabaDatosUsuarios = mysqli_query($conn,$sqlDatosUsuarios);
    }else {
        echo "no";
    }
    
    header('Location: index.php?rut='.$GNUrut);
?>