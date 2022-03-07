<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('videojuegos.index') }}">Mancos Anónimos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto d-flex justify-content-between" style="width:100%;">
            <div class="d-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Videojuegos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('videojuegos.index') }}">Consulta de Videojuegos</a></li>
                        @can('create-videogame')
                        <li><a class="dropdown-item" href="{{ route('videojuegos.create') }}">Registrar Videojuegos</a></li>
                        @endcan
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('categorias.index') }}" class="dropdown-item">Ver Categorias</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('plataformas.index') }}" class="dropdown-item">Ver Plataformas</a></li>
                    </ul>
                </li>
                @can('create-videogame')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Usuarios</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('registro.get') }}">Registrar Usuario</a></li>
                    </ul>
                </li>
                @endcan
                
            </div>
            <div class="d-flex align-items-center">
                <li class="text-light me-2">{{ auth() -> user() -> email }}</li>
                <li class="text-light me-2">{{ (auth() -> user() -> perfil == 1) ? 'Administrador' : 'Usuario' }}</li>
                <li class="nav-item float-right">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary ms-3">Cerrar Sesión</button>
                    </form>
                </li>
            </div>
        </ul>
      </div>
    </div>
  </nav>