@extends('layouts/layout')

@section('title', "Cash Inventory | Inicio")

@section('content')

    <div class="cuadro_total"></div>
    <div class="cuadro_total_container">
        <div class="row">
            <div class="col-5">
                <img src="/storage/img/error401.png" alt="" width="600px">
            </div>
            <div class="col-2"><br><br></div>
            <div class="col-5">
                <h1 class="titulo_error"> ERROR 401</h1><br>
                <h1 class="subtitulo_error"> ACCESO NO AUTORIZADO</h1>
            </div>
        </div>
        

    </div>
    
    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
