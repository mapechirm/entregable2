<x-template title="Login" :css="false" :style="false" :isForm="true">
  <x-slot name="content">
    <div class="d-flex justify-content-center flex-column" style="height: 97vh">
      <h1 class="m-4 pb-4 text-center">Ingreso a Mancos Anónimos</h1>
      <div class="d-flex justify-content-center align-items-center">
        <form
          action="{{ route('login') }}"
          method="post"
          class="d-grid gap-2 needs-validation"
          novalidate
        >
          @csrf
          <div class="form-floating">
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="wuenas"
              name="email"
              required
            />
            <label for="email" class="form-label">Correo Electrónico</label>
            <div class="invalid-feedback">
              Por favor llene este campo con una dirección de correo electrónico
              válido
            </div>
          </div>
          <div class="form-floating">
            <input
              type="password"
              class="form-control"
              id="pass"
              placeholder="a"
              name="password"
              required
            />
            <label for="pass" class="form-label">Contraseña</label>
            <div class="invalid-feedback">
              Por favor llene este campo con una contraseña válida
            </div>
          </div>
          <input
            type="submit"
            value="Ingresar"
            class="btn btn-success m-2 mt-3"
            name=""
          />
        </form>
      </div>
    </div class="d-flex align-items-center">
  </x-slot>
</x-template>
