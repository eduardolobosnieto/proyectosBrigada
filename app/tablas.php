<?php
require 'config/database.php';
$rut = $_GET['rut'];

//Todos los proyectos de la persona
$consultaProyect = "SELECT
proyecto.*, 
descripcionproyecto.*
FROM
proyecto
INNER JOIN
descripcionproyecto
ON 
    proyecto.id_proyecto = descripcionproyecto.id_proyecto
WHERE
proyecto.rut = $rut";


//Datos personales
$consultaDatos = "SELECT
datospersonal.rut, 
persona.app, 
persona.apm, 
persona.nombres, 
grado.grado
FROM
datospersonal
INNER JOIN
persona
ON 
    datospersonal.rut = persona.rut
INNER JOIN
grado
ON 
    datospersonal.grado = grado.id_grado
WHERE
datospersonal.rut = $rut";



//Botones Editar - Eliminar
$BotonesEditDelet = "SELECT
descripcionproyecto.id_proyecto, 
MAX(descripcionproyecto.version) AS maxim
FROM
descripcionproyecto
GROUP BY
descripcionproyecto.id_proyecto";


//Numero de Proyectos por persona
$consultaProyectNum = "SELECT COUNt(*) total FROM proyecto WHERE proyecto.rut = $rut";


$SQLconsultaDatos = $conn->query($consultaDatos);
$Datos = mysqli_fetch_array($SQLconsultaDatos);

$SQLconsultaProyectNum = $conn->query($consultaProyectNum);
$res=mysqli_fetch_assoc($SQLconsultaProyectNum);









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos Brigada</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-3">

    <h2>TABLAS</h2>
    <p><?php echo "Bienvenido ".$Datos['4']." ".$Datos['3']." ".$Datos['1']." ".$Datos['2']." ud tiene ".$res['total']." proyectos"; ?></p>


<div class="row justify-content-end">
    <div class="col-auto">
        <a href="../index.php" class="btn btn-warning" data-bs-toggle="" data-bs-target="#"> <i class="fa-solid fa-person-running"></i> Salir</a>
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoProyModal"> <i class="fa-regular fa-square-plus"></i> Nuevo</a>
    </div>
</div>
    <table class="table table-sm table-striped table-hover mt-2">
        <thead>
            <tr>
            <th>Nombre</th><th>Descripconc</th><th>Version</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
<?php

$SQLbotones = $conn->query($BotonesEditDelet);
$SQLconsultaProyect = $conn->query($consultaProyect);



while ($rowProy1 = $SQLconsultaProyect->fetch_array()){
    echo "<tr>";
    echo "<td>".$rowProy1['2']."</td>";
    echo "<td>".$rowProy1['7']."</td>";
    echo "<td>".$rowProy1['9']."</td>";
    echo "<td>".$rowProy1['4']."</td>";
    echo "<td>";
        while ($rowProy = $SQLbotones->fetch_array()){
                if(($rowProy1['0'] == $rowProy['0']) && ($rowProy1['9'] == $rowProy['maxim'])){?>
                    <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editaProyModal"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                <?php }
        }
    mysqli_data_seek($SQLbotones,0);
    echo "</td>";
    echo "<tr>";
}

?>




</td>
<tr>


  </tbody>
        </table>
    </div>





<?php include 'newProyModal.php';?>
<?php include 'editProyModal.php';?>

<script>
let editaModal = document.getElementById('editaProyModal')

editaModal.addEventListener('shown.bs.modal',event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    let inputId = 1//editaModal.querySelector('.modal-body #id')


})
</script>
    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>