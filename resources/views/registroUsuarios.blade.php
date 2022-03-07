<x-template title="Registro de Usuarios" :css="false" :style="false" :isForm="true">
  <x-slot name="content">
    <h1 class="m-4 pb-4 text-center">Registro de Usuarios</h1>
      <div class="d-flex justify-content-center align-items-center">
        <form
          action="{{ route('registro.set') }}"
          method="post"
          class="d-grid gap-2 needs-validation"
          novalidate
        >
          @csrf
          <div class="form-floating">
            <input
              id="usuario"
              type="email"
              class="form-control"
              name="user"
              placeholder="Correo electrónico"
              required
            />
            <label for="usuario" class="form-label">Correo electrónico</label>
            <div class="invalid-feedback">
              Por favor llene este campo con una dirección de correo electrónico
              válido
            </div>
          </div>
          <div class="form-floating">
            <input
              id="pass"
              type="text"
              class="form-control"
              name="pass"
              placeholder="aerhkga"
              required
            />
            <label for="pass" class="form-label">Contraseña</label>
            <div class="invalid-feedback">
              Por favor llene este campo con una contraseña válida
            </div>
          </div>
          <div class="form-floating">
            <input
              id="confpass"
              type="text"
              class="form-control"
              name="confpass"
              placeholder="a"
              required
            />
            <label for="confpass" class="form-label">Confirmar contraseña</label>
            <div class="invalid-feedback">Las contraseñas no coinciden</div>
          </div>
          <div class="diseno-perfil">
            <label>Pefil de usuario</label>
            <!-- Añadir los perfiles pertinentes -->
            <div class="form-check">
              <input
                id="perfil1"
                type="radio"
                class="form-check-input"
                name="perfil"
                value="1"
                checked
              />
              <label for="perfil1">Administrador</label>
            </div>
            <div class="form-check">
              <input
                id="perfil2"
                type="radio"
                class="form-check-input"
                name="perfil"
                value="0"
              />
              <label for="perfil2">Usuario</label>
            </div>
          </div>
          <input
            type="submit"
            value="Registrar usuario"
            class="btn btn-success m-2"
            name="registrarUsuario"
          />
        </form>
      </div>
  </x-slot>
</x-template>