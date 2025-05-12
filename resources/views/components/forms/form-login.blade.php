@props(['type', 'action' => '#!'])

<form id="formAuthentication-{{ $type }}" class="mb-3" action="{{ $action }}" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label fw-medium">Correo o Número de Identificación *</label>
        <input
            type="text"
            class="form-control"
            id="email"
            name="email-username"
            placeholder="Enter your email or username"
            autofocus />
    </div>
    <div class="mb-2 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label fw-medium" for="password">Contraseña *</label>
        </div>
        <div class="input-group input-group-merge">
            <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
        </div>
    </div>
    <div class="mb-5">
        <a href="#!" class="fs-12p"><small>Olvidé mi contraseña</small></a>
    </div>
    <div class="mb-3">
        <button class="btn btn-lg btn-blue-veris d-grid w-100" type="submit">Iniciar sesión</button>
    </div>
</form>