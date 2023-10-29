<?php
$rut = $_GET['rut'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos Brigada</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-md">
        ingreso a proyectos
    </div>


    <div class="container text-center">
    <div class="row justify-content-center">
    <div class="col-4">



    <form class="row g-4" action="verif.php" method="post" name="formulario">
  <div class="col-9">
    <label for="rut" class="form-label">Ingrese su RUT Sin puntos ni Digito</label>
    <input type="text" class="form-control" id="ruuu" name="ruuu" value="<?= $rut; ?>">
  </div>
  <div class="col-9">
    <label for="rut" class="form-label">Ingrese su CLAVE</label>
    <input type="text" class="form-control" id="clae" name="clae">
  </div>

  <div class="col-9">
    <input type="submit" class="btn btn-primary" value="Entrar"/>
  </div>

</form>







    </div>

  </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
