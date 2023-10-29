<!-- Modal -->
<div class="modal fade" id="editaProyModal" tabindex="-1" aria-labelledby="editaProyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoProyModalLabel">Editar Proyecto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="newProy.php" method="post">
          <input type="text" id="id" name="id">
          <div class="mb-3">
            <input type="hidden" id="rut" name="rut" value="<?= $rut; ?>"/>
            <label for="nombre" class="form-label">Nombre del Proyecto: </label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion: </label>
            <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Version del Proyecto: </label>
            <br/>
            <label for="nombre" class="form-label">Estado del Proyecto: </label>
            <br/>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Grabar</button>


        </form>
      
      </div>

    </div>
  </div>
</div>