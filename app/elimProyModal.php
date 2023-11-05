<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</html>

<?php
require 'config/database.php';

$XX = $_POST['id'];

$BDD = "UPDATE proyecto SET estado = 1 WHERE proyecto.id_proyecto = $XX";

$ss = $conn->query($BDD);

?>