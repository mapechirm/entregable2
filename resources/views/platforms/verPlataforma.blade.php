<x-template title="{{ $plataforma }}" :css="false" :style="false" :isForm="false">
    <x-slot name="content">
        <h1>{{ $plataforma }}</h1>
        <div class="d-flex flex-wrap m-4 justify-content-center align-items-center">
        @foreach ($videogames as $videogame)
        <div class="card m-2" style="width:16rem;">
            <img src="/storage/{{ $videogame -> image }}" alt="{{ $videogame -> nombre }}" class="card-img-top" style="max-height: 340px; object-fit: cover">
            <div class="card-body">
                <h5 class="card-title">{{ $videogame -> nombre }}</h5>
                <a href="{{ route('videojuegos.show', $videogame -> slug) }}" class="btn btn-primary stretched-link">Ver videojuego</a>
            </div>
        </div>
        @endforeach
        </div>
    </x-slot>
</x-template>