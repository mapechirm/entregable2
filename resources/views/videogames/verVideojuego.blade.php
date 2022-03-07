<x-template title="Vista {{ $videogame -> nombre }}" :css="false" :style="false" :isForm="false">
    <x-slot name="content">
        <h1 class="mb-4 p-4">{{ $videogame -> nombre }}</h1>
        <div class="d-flex flex-wrap justify-content-around">
            <div>
                <h5><a href="{{ route('categorias.show', $videogame -> category -> slug) }}" class="text-decoration-none">Categoria: {{ $videogame -> category -> nombre }}</a></h5>
                <h5>Plataformas: </h5>
                <ul>
                    @foreach ($videogame -> platforms as $platform)
                        <li><a href="{{ route('plataformas.show', $platform -> slug) }}" class="text-decoration-none text-dark">{{ $platform -> nombre }}</a></li>
                    @endforeach
                </ul>
                <h5>Precio de Adquisicion: ${{ $videogame -> precioAdq }}</h5>
                <h5>Precio de Venta: ${{ $videogame -> precioVent }}</h5>
                <a href="{{ url() -> previous() }}"><button class="btn btn-outline-primary mt-5">Regresar</button></a>
            </div>
            <div>
                <img src="/storage/{{ $videogame -> image }}" alt="Imagen" style="max-height: 340px; object-fit: cover">
            </div>
        </div>
    </x-slot>
</x-template>