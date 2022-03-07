<x-template title="Registro de Videojuegos" :css="false" :style="true">
  <x-slot name="stylecontent">
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </x-slot>

  <x-slot name="content">
    <div class="justify-content-center align-self-center justify-self-center">
      <h1 class="m-2 pb-4 mt-4 text-center">Registro de Videojuegos</h1>
        <form
          action="{{ route('videojuegos.store') }}"
          method="post"
          class="d-grid gap-2 needs-validation"
          enctype="multipart/form-data"
        >
        @csrf
          <div class="d-flex flex-wrap justify-content-center">
            <div class="p-2">
              <div class="form-floating m-1">
                <input
                  id="nombre"
                  type="text"
                  class="form-control"
                  name="name"
                  placeholder="a"
                />
                <label for="nombre" class="form-label">Nombre del Videojuego</label>
                <div class="text-danger">
                  @if ($errors -> first())
                    {{ $errors -> first('name') }} <i class="fa-solid fa-circle-exclamation text-danger"></i>
                  @endif
                </div>
              </div>
              
              <div class="input-group p-1">
                <span class="input-group-text"> Clasificación </span>
                <select name="category" id="" class="form-select">
                  @foreach ($categories as $category)
                      <option value="{{ $category -> id }}" > {{ $category -> nombre }} </option>
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
                />
                <label for="confpass" class="form-label">Precio de Adquisición</label>
                <div class="text-danger">
                @if ($errors -> first('precio'))
                  {{ $errors -> first('precio') }} <i class="fa-solid fa-circle-exclamation text-danger"></i>
                @endif</div>
              </div>
              <div class="mb-3 m-1">
                <label for="formFile" class="form-label">Imagen</label>
                <input name="imagen" class="form-control" type="file" id="formFile" >
                <div class="text-danger">
                @if ($errors -> first('imagen'))
                  {{ $errors -> first('imagen') }} <i class="fa-solid fa-circle-exclamation text-danger"></i>
                @endif</div>
              </div>
            </div>
            
            <div class="m-2">
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
      
          <input
            type="submit"
            value="Registrar videojuego"
            class="btn btn-success m-2"
            name="registrarUsuario"
            style="width: 16rem; justify-self:center;"
          />
        </form>
    </div>
      <script src="/js/platformAdd.js"></script>
  </x-slot>
  <x-slot name="stylecontent">
    #plataformas span {
      cursor: pointer;
    }

    .plataforma-item {
      width:100%;
    }
  </x-slot>
</x-template>