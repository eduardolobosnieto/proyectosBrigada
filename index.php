<?php
require 'app/config/database.php';

$consulta = "SELECT
descripcionproyecto.descripcionProyecto AS dp, 
m.id_proyecto AS id, 
m.maxim AS m, 
proyecto.nombreProyecto, 
proyecto.fechaCreacion, 
proyecto.estado, 
datospersonal.grado, 
persona.app, 
persona.apm, 
persona.nombres, 
grado.grado, 
unidad.unidad
FROM
(
    SELECT
        descripcionproyecto.id_proyecto, 
        MAX(descripcionproyecto.version) AS maxim
    FROM
        descripcionproyecto
    GROUP BY
        descripcionproyecto.id_proyecto
) AS m
INNER JOIN
descripcionproyecto
INNER JOIN
proyecto
ON 
    descripcionproyecto.id_proyecto = proyecto.id_proyecto
INNER JOIN
datospersonal
ON 
    proyecto.rut = datospersonal.rut
INNER JOIN
persona
ON 
    datospersonal.rut = persona.rut
INNER JOIN
grado
ON 
    datospersonal.grado = grado.id_grado
INNER JOIN
unidad
ON 
    datospersonal.unidad = unidad.id_unidad
WHERE
descripcionproyecto.id_proyecto = m.id_proyecto AND
descripcionproyecto.version = m.maxim AND
proyecto.estado <> 1";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos Brigada</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-3">

    <h2>TODOS LOS PROYECTOS</h2>


<div class="row justify-content-end">
    <div class="col-auto">
        <a href="./indexIn.php" class="btn btn-success" data-bs-toggle="" data-bs-target="#"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Ingresar</a>
    </div>
</div>




<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre Proyecto</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Grado</th>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>


<?php
$consultaSQL = $conn->query($consulta);
//$datos = mysqli_fetch_array($consultaSQL);
while($rowProy = $consultaSQL->fetch_array()){?>
<tr>
<td><?php echo $rowProy['3'] ?></td>
<td><?php echo $rowProy['0'] ?></td>
<td><?php echo $rowProy['10'] ?></td>
<td><?php echo $rowProy['7'] ?></td>
<td><?php echo $rowProy['9'] ?></td>
<tr>
<?php }?>

  </tbody>
</table>






    </div>



    <script src="assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>