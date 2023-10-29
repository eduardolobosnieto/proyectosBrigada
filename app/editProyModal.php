<!-- Modal -->
<div class="modal fade" id="edit<?= $rowProy1['5'];?>" tabindex="-1" aria-labelledby="editaProyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editaProyModalLabel">Editar Proyecto - <?= $Datos['4']." ".$Datos['3']." ".$Datos['1']." ".$Datos['2'];?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="#" method="post">
          <div class="mb-3">
            <input type="hidden" id="rut" name="rut" value="<?= $rut; ?>"/>
            <label for="nombre" class="form-label">Nombre del Proyecto: </label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $rowProy1['2'];?>" disabled>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion: </label>
            <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="3" required><?= $rowProy1['7'];?></textarea>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Version del Proyecto: <?php echo $rowProy1['9'];?></label>
            <br/>
            <label for="nombre" class="form-label">Estado del Proyecto: <?php echo $rowProy1['10'];?></label>
            <br/>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
          <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> Editar</button>


        </form>
      
      </div>

    </div>
  </div>
</div>