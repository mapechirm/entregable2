<x-template title="Plataformas" :css="false" :style="false" :isForm="false">
    <x-slot name="content">
        <h1>Plataformas</h1>
        <div class="d-flex flex-wrap m-4 justify-content-center align-items-center">
            @foreach ($plataformas as $plataforma)
            <div class="card m-2" style="width:16rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $plataforma -> nombre }}</h5>
                    <a href="{{ route('plataformas.show', $plataforma -> slug) }}" class="btn btn-primary stretched-link">Ver plataforma</a>
                </div>
            </div>
            @endforeach
        </div>
    </x-slot>
</x-template>