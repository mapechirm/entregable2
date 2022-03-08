<!-- Modal borrar-->
<div class="modal" id="eliminarVideojuego{{ $cont }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Videojuego</h4>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
          ></button>
        </div>
        <div class="modal-body">Nombre del videojuego:  {{ $videojuego -> nombre }}</div>
        <div class="modal-footer">
          <form action="{{ route("videojuegos.destroy", ["videojuego" => $videojuego]) }}" method="post" class="form-eliminar">
            @method("DELETE")
            @csrf
            <button
            type="submit"
            class="btn btn-primary"
            data-bs-dismiss="modal"
          >
            Eliminar Registro
          </button>
          </form>
          <button
            type="button"
            class="btn btn-danger"
            data-bs-dismiss="modal"
          >
            Cancelar
          </button>
        </div>
      </div>
    </div>
  </div>