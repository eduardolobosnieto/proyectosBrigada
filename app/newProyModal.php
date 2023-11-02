<!-- Modal -->
<div class="modal fade" id="nuevoProyModal" tabindex="-1" aria-labelledby="nuevoProyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoProyModalLabel">Nuevo Proyecto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="newProy.php" method="post">
          <div class="mb-3">
            <input type="hidden" id="rut" name="rut" value="<?= $rut; ?>"/>
            <label for="nombre" class="form-label">Nombre del Proyecto: </label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion: </label>
            <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cerrar</button>
          <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Grabar</button>


        </form>
      
      </div>

    </div>
  </div>
</div>