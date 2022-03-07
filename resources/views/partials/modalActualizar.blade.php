<!-- Modal actualizar -->
<div class="modal" id="actualizarVideojuego{{ $cont }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Actualizar Videojuego</h4>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
        ></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form
          action="{{ route('videojuegos.update', ["videojuego" => $videojuego ]) }}"
          method="POST"
          class="d-grid gap-2 needs-validation"
          style="width: 100%"
          enctype="multipart/form-data"
        >
          @method('PUT')
          @csrf
          <div class="d-flex flex-wrap justify-content-center">
            <div class="p-2">
              <div class="form-floating m-1">
                <input
                  id="nombre"
                  type="text"
                  class="form-control"
                  name="nombre"
                  placeholder="a"
                  value="{{ $videojuego -> nombre }}"
                />
                <label for="nombre" class="form-label">Nombre del Videojuego</label>
                <div class="text-danger">
                  @if ($errors -> first())
                    {{ $errors -> first('nombre') }} <i class="fa-solid fa-circle-exclamation text-danger"></i>
                  @endif
                </div>
              </div>
              
              <div class="input-group p-1">
                <span class="input-group-text"> Clasificación </span>
                <select name="category" id="" class="form-select">
                  @foreach ($categories as $category)
                      <option value="{{ $category -> id }}" {!! ($videojuego -> category  == $category) ? 'selected' : ''!!}> {{ $category -> nombre }} </option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-floating m-1">
                <input
                  id="precio"
                  type="number"
                  class="form-control"
                  name="precio"
                  placeholder="a"
                  step="0.01"
                  value="{{ $videojuego -> precioAdq }}"
                />
                <label for="confpass" class="form-label">Precio de Adquisición</label>
                <div class="text-danger">
                @if ($errors -> first('precio'))
                  {{ $errors -> first('precio') }} <i class="fa-solid fa-circle-exclamation text-danger"></i>
                @endif</div>
              </div>
              @if ($videojuego -> image)
                  <img src="/storage/{{ $videojuego -> image }}" alt="{{ $videojuego -> nombre }}" class="card-img-top" style="max-height: 340px; object-fit: cover">
              @endif
              <div class="mb-1 m-1">
                <label for="formFile" class="form-label">Imagen</label>
                <input name="imagen" class="form-control" type="file" id="formFile">
                <small>Favor de no seleccionar imagen si no se va a modificar</small>
                <div class="text-danger">
                @if ($errors -> first('imagen'))
                  {{ $errors -> first('imagen') }} <i class="fa-solid fa-circle-exclamation text-danger"></i>
                @endif</div>
              </div>
            </div>
            
            <div>
              <label for="plataforma" class="form-label">Plataformas</label>
              <div class="">
                <div id="plataformas"></div>
                <div class="d-flex">
                  <select class="form-select" id="plataforma">
                    @foreach ($platforms as $platform)
                        <option value="{{ $platform -> nombre }}">{{ $platform -> nombre }}</option>
                    @endforeach  
                  </select>
                  <button class="btn btn-primary btn-sm" name="agregarPlataforma" type="button" id="agregarPlataforma" value="">Agregar Plataforma</button>
                </div>
              </div>
            </div>
          </div>
          <div class="container d-flex m-3 justify-content-end modal-footer">
            <button
              type="submit"
              class="btn btn-primary m-2"
            >
              Actualizar registro
            </button>
            <button
              type="button"
              class="btn btn-danger m-2"
              data-bs-dismiss="modal"
            >
              Cancelar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>