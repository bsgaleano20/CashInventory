@extends('layouts/layout')

@section('title', "Cash Inventory | Mi Perfil")

@section('content')
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
                <form action="" method="post" class="formulario">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" value="{{ auth()-> user()->email; }}" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">✆</span>
                        <input type="number" class="form-control" value="{{ auth()-> user()->celular; }}" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">🔒</span>
                        <input type="password" class="form-control" value="***************" aria-label="Username" aria-describedby="basic-addon1">
                    </div><br>
                    <div class="d-grid gap-2">
                        <a href="home.php"><input type="button" value="Actualizar" class="btn btn-success"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
