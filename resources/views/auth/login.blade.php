@extends('layouts/layout_login')

@section('title', "Cash Inventory | Login")

@section('content')

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- ++++++++++++++++++++++++++++++ Banner +++++++++++++++++++++++++++++++ -->
    <img src="/storage/img/banner.jpg" alt="" class="cashinventoryLogo">

    <!-- ++++++++++++++++++++++++++++++ Caja Semitrasparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_login"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedor +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_container_login">

        <!-- ++++++++++++++++++++++++++++++ Formuario +++++++++++++++++++++++++++++++ -->
        <h1 id="login">LOGIN</h1>
        <form action="{{ route('login') }}" method="POST" class="formulario_login">
            
            @csrf

            <!-- Email Address -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="email" class="form-control" 
                        placeholder="Email" aria-label="Username" 
                        aria-describedby="basic-addon1" id="email" name="email" 
                        :value="old('email')" required autofocus autocomplete="username" />
                

                {{-- <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
            </div>

            <!-- Password -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">🔒</span>
                <input type="password" class="form-control" 
                    placeholder="Password" aria-label="Username" 
                    aria-describedby="basic-addon1" name="password"
                    id="password" required autocomplete="current-password">

                {{-- <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" /> --}}
            </div>
            <x-input-error :messages="$errors->get('email')" class="text-warning" />
            <x-input-error :messages="$errors->get('password')" class="text-warning" />


            <a href="#" class="conf_icon" data-bs-toggle="modal" data-bs-target="#exampleModal">Olvide mi contraseña</a><br><br>
            <a href=""><input type="submit" value="Iniciar Sesión" class="btn btn-success"></a>
        </form>
    </div>

    <!-- ++++++++++++++++++++++++++++++ Ventana Emergente - Recuperación de contraseña +++++++++++++++++++++++++++++++ -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Restablecer Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Digita el correo de tu cuenta, te llegará un email con el link para realizar el restablecimiento de contraseña <br><br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

@endsection