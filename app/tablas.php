<?php
require 'config/database.php';
$rut = $_GET['rut'];

if (isset($_GET['save']) == 1){
$save = "- SIN CAMBIO";
}
else{
$save = "";
}

//Todos los proyectos de la persona
$consultaProyect = "SELECT
proyecto.*, 
descripcionproyecto.*, 
estado.estado
FROM
proyecto
INNER JOIN
descripcionproyecto
ON 
    proyecto.id_proyecto = descripcionproyecto.id_proyecto
INNER JOIN
estado
ON 
    proyecto.estado = estado.id_estado
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container py-3">

    <h2>TABLAS <?php echo $save ?></h2>
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
    echo "<td>".$rowProy1['0']." - ".$rowProy1['5']." - ".$rowProy1['2']."</td>";//idProy idDescProy - nombre
    echo "<td>".$rowProy1['7']."</td>";//desc
    echo "<td>".$rowProy1['9']."</td>";//version
    echo "<td>".$rowProy1['4']." - ".$rowProy1['10']."</td>";//estado n est val
    echo "<td>";
    if($rowProy1['4'] != 1){
        while ($rowProy = $SQLbotones->fetch_array()){
                if(($rowProy1['0'] == $rowProy['0']) && ($rowProy1['9'] == $rowProy['maxim'])){?>
                    <a href="#edit<?= $rowProy1['5'];?>" class="btn btn-sm btn-success" data-bs-toggle="modal"><i class="far fa-edit"></i></a>
                    <button class="btn btn-sm btn-danger" onclick="elimProySwAl(<?php echo $rowProy1['0'];?>,<?php echo $rut;?>)"><i class="far fa-trash-alt"></i></button>
                    <?php include ("editProyModal.php");?>
                <?php }
        }
    mysqli_data_seek($SQLbotones,0);
    echo "</td>";
    echo "<tr>";
    }
    else{
        echo "</td>";
        echo "<tr>";
    }
}




?>




</td>
<tr>


  </tbody>
        </table>
    </div>





<?php include 'newProyModal.php';?>




    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>

    function elimProySwAl(codigo,rut){
    Swal.fire({
  title: 'Esta seguro?',
  text: "¡No podrás revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Sí, bórralo!'
}).then((result) => {
  if (result.isConfirmed) {
    mandar_php(codigo,rut)
  }
})

}

function mandar_php(codigo,rut){
    parametros = {id: codigo};
    $.ajax({
        data: parametros,
        url: 'elimProyModal.php',
        type: 'POST',
        beforeSend: function(){},
        success:function(){
            Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    ).then((result)=>{
                window.location.href ='tablas.php?rut='+rut
            });
        },
    });
}
    </script>
</body>
</html>