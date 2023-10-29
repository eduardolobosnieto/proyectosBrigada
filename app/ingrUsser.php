<?php
require 'config/database.php';
$rutt = $_GET['rut'];
$sqlUsserNew = "SELECT persona.* FROM persona WHERE persona.rut = $rutt";
$usuario = $conn->query($sqlUsserNew);
while($row = mysqli_fetch_array($usuario)){
    $Urut = $row['rut'];
    $Udv = $row['dv'];
    $Uapp = $row['app'];
    $Uapm = $row['apm'];
    $Unombre = $row['nombres'];
};
$sqlgrado = "SELECT grado.* FROM grado";
$sqlunidad = "SELECT * FROM unidad";
$grados = $conn->query($sqlgrado);
$unidades = $conn->query($sqlunidad);
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INGRESO DE USUARIO</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="container-sm">
        Ingreso usuario
    </div>


    <div class="container">
  <div class="row justify-content-md-center">

    <div class="col-sm-8">

    <a href="../index.php" class="btn btn-primary float-right" > Volver Atrás</a>
<form action="grabaUsserNew.php" method="post" name="formulario">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="rut" name="rut" class="form-control" value="<?= $Urut; ?>" disabled/>
        <input type="hidden" id="rut" name="rut" value="<?= $Urut; ?>"/>
        <label class="form-label" for="rut">Rut</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="dv" name="dv" class="form-control" value="<?= $Udv; ?>" disabled/>
        <input type="hidden" id="dv" name="dv" value="<?= $Udv; ?>"/>
        <label class="form-label" for="dv">DV</i></label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $Unombre ;?>" disabled/>
    <input type="hidden" id="nombre" name="nombre" value="<?= $Unombre; ?>"/>
    <label class="form-label" for="nombre">Nombre</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="app" name="app" class="form-control" value="<?= $Uapp ;?>" disabled/>
    <input type="hidden" id="app" name="app" value="<?= $Uapp; ?>"/>
    <label class="form-label" for="app">Ap. Paterno</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="apm" name="apm" class="form-control" value="<?= $Uapm ;?>" disabled/>
    <input type="hidden" id="apm" name="apm" value="<?= $Uapm; ?>"/>
    <label class="form-label" for="apm">Ap. Materno</label>
  </div>

  <!-- Number input -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <select name="grado" id="grado" class="form-select">
        <option value="">Seleccione</option>
        <?php while($row_grado = $grados->fetch_assoc()) {?>
        <option value="<?php echo $row_grado['id_grado']; ?>" required><?= $row_grado['grado'];?></option>
        <?php } ?>
        </select>
        <label class="form-label" for="grado">Grado</label>
      </div>
    </div>


    <div class="col">
      <div class="form-outline">
        <select name="unidad" id="unidad" class="form-select">
        <option value="">Seleccione</option>
        <?php while($row_unidad = $unidades->fetch_assoc()) {?>
        <option value="<?php echo $row_unidad['id_unidad']; ?>"><?= $row_unidad['unidad'];?></option>
        <?php } ?>
        </select>
        <label class="form-label" for="dv">Unidad</label>
      </div>
    </div>
  </div>

  <!-- Message input -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="anexo" name="anexo" class="form-control"/>
        <label class="form-label" for="rut">Anexo</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
      <div class="col">
      <div class="form-outline">
        <input type="text" id="clae" name="clae" class="form-control"/>
        <label class="form-label" for="rut">Clave</label>
      </div>
    </div>
      </div>
    </div>


  </div>

  <!-- Checkbox -->


  <!-- Submit button -->
  <button type="submit" class="btn btn-success btn-block mb-4">Crear Cuenta</button>
  <button type="reset" class="btn btn-danger btn-block mb-4">Reset</button>
</form>




    </div></div>
  </div>

</div>








</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>