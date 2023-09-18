@extends('layouts/layout')

@section('title', "Cash Inventory | Mi Perfil")

@section('content')

{{-- ALERT USUARIO EDITADO --}}
@if (session('actualizar_usuario'))
    <div class="alert alert-success" role="alert">
        {{ session('actualizar_usuario') }}
    </div>
@endif

    <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>
    <!-- ++++++++++++++++++++++++++++++ Contenedor Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">
            <!-- ++++++++++++++++++++++++++++++ Cambio de foto de perfil +++++++++++++++++++++++++++++++ -->
            <div class="col-5">
                <br>
                <img src="/storage/img/usuario.png" alt="" id="foto_perfil_conf" >
                <a href="#"class="camera"><i class="bi bi-camera"></i></a>
            </div>

            <div class="col-7">
                <br>
                <!-- ++++++++++++++++++++++++++++++ Información básica +++++++++++++++++++++++++++++++ -->

                <h5 class="texto">{{ auth()-> user()->nombre_usuario; }}</h5>
                <form action="{{ route('mi_perfil.update') }}" method="post" class="formulario">
                    @csrf
                    <input hidden name="id" value="{{ auth()-> user()->id; }}">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" disabled class="form-control" value="{{ auth()-> user()->email; }}" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">✆</span>
                        <input type="number" class="form-control" name="phone" value="{{ auth()-> user()->celular; }}" aria-label="Username" aria-describedby="basic-addon1">
                        <x-input-error :messages="$errors->get('phone')" class="text-warning" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">🔒</span>
                        <input type="password" required class="form-control" name="password" placeholder="***************" aria-label="Username" aria-describedby="basic-addon1">
                        <x-input-error :messages="$errors->get('password')" class="text-warning" />
                    </div><br>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </div>

                    
                </form>
            </div>
        </div>
    </div>

    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
