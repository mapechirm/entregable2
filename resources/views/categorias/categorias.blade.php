<x-template title="Categorias" :css="false" :style="false" :isForm="false">
    <x-slot name="content">
        <h1>Categorias</h1>
        <div class="d-flex flex-wrap m-4 justify-content-center align-items-center">
            @foreach ($categorias as $categoria)
            <div class="card m-2" style="width:16rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria -> nombre }}</h5>
                    <a href="{{ route('categorias.show', $categoria -> slug) }}" class="btn btn-primary stretched-link">Ver categoria</a>
                </div>
            </div>
            @endforeach
        </div>
    </x-slot>
</x-template>