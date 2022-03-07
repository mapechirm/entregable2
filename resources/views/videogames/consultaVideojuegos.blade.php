
<x-template title="Consulta de Videojuegos" :css="false" :style="false" :isForm="true">
    <x-slot name="content">
    
      @php
      $cont = 1 
      @endphp

    <div class="container overflow-auto">
    <h1 class="m-4 pb-4 text-center">Consulta de Videojuegos</h1>
        <table
          class="table table-hover table-striped table-bordered table-responsive"
        >
          <thead class="table-dark">
            <th>Nombre del videojuego</th>
            <th>Precio Adquisición</th>
            <th>Precio Venta</th>
            <th>Ver videojuego</th>
            @can('create-videogame')
            <th>Actualización</th>
            <th>Eliminación</th>
            @endcan
          </thead>
          <tbody>
            @foreach ($videojuegos as $videojuego)
            <tr>
              <td>{{ $videojuego -> nombre }}</td>
              <td>${{ $videojuego -> precioAdq }}</td>
              <td>${{ $videojuego -> precioVent }}</td>
              <td><a href="{{ route('videojuegos.show', $videojuego -> slug) }}"><button class="btn btn-warning">Ver videojuegos</button></a></td>
              @can('create-videogame')
              <td>
                <button
                  type="button"
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#actualizarVideojuego{{ $cont }}"
                >
                  Actualizar registro
                </button>
              </td>
              <td>
                <button
                  type="button"
                  class="btn btn-danger"
                  data-bs-toggle="modal"
                  data-bs-target="#eliminarVideojuego{{ $cont++ }}"
                >
                  Eliminar registro
                </button>
              </td>
              @endcan
            </tr>
            @endforeach

            @php
            $cont = 1 
            @endphp

            @can('create-videogame')
              @foreach ($videojuegos as $videojuego)
                  @include('partials.modalActualizar')
                  @include('partials.modalBorrar')
                  @php
                      $cont++
                  @endphp
              @endforeach
            @endcan

          </tbody>
        </table>

        @can('create-videogame')
        <h4 class="mt-4">Videojuegos Eliminados</h4>
        <table class="table table-hover table-striped table-bordered table-responsive">
          <thead class="table-dark">
            <th>Nombre del Videojuego</th>
            <th>Restaurar Videojuego</th>
            <th>Eliminar Permanentemente</th>
          </thead>
          <tbody>
            @foreach ($deletedVideogames as $videogame)
              <tr>
                <td>{{ $videogame -> nombre }}</td>
                <td class="text-center">
                  <form action="{{ route('videojuegos.restore', $videogame) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-info" type="submit">Restaurar</button>
                  </form>
                </td>
                <td class="text-center">
                  <form action="{{ route('videojuegos.forceDelete', $videogame) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @endcan
        
      </div>
    </x-slot>
</x-template>