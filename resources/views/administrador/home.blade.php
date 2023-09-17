@extends('layouts/layout')

@section('title', "Cash Inventory | Inicio")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_left"></div>
    <div class="cuadro_right"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_left_container">

        <!-- ++++++++++++++++++++++++++++++ MODULOS +++++++++++++++++++++++++++++++ -->
        <h1 class="titulo_modulo">MODULOS</h1><br><br>
        <div class="d-grid gap-2">
            <a class="btn btn-warning btn-lg" role="button" href="/gestion_usuario"><i class="bi bi-people-fill"></i> Gestión de usuarios</a>
            <a class="btn btn-warning btn-lg" role="button" href="/gestion_inventario"><i class="bi bi-archive-fill"></i> Inventario</a>
            <a class="btn btn-warning btn-lg" role="button" href="/reportes"><i class="bi bi-bar-chart-line-fill"></i> Reportes</a>
            <a class="btn btn-warning btn-lg" role="button" href="/autorizaciones"><i class="bi bi-bookmark-check-fill"></i> Autorización de cambios </a>
            <a class="btn btn-warning btn-lg" role="button" href="/gestion_movimientos"><i class="bi bi-dropbox"></i> Movimientos de mercancia </a>
        </div>
    </div>
    <div class="cuadro_right_container scroll">
        <!-- ++++++++++++++++++++++++++++++ HISTORIAL +++++++++++++++++++++++++++++++ -->
        <div class="row">
            <div class="col-12">
                <h1 class="titulo_modulo">ULTIMAS VENTAS</h1><br>
            </div>
        </div>


        <table class="table table-light table-striped">
            <thead>
                <tr class="table-dark">
                    <th class="table-dark" scope="col">Fecha</th>
                    <th class="table-dark"scope="col">Elemento</th>
                    <th class="table-dark" scope="col">Valor unitario</th>
                    <th class="table-dark"scope="col">Cantidad</th>
                    <th class="table-dark" scope="col">Valor total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detallefacturas as $detallefactura)
                    <tr class="table-light">
                        <th class="table-light" scope="row">{{ $detallefactura->created_at }}</th>
                        <td class="table-light">{{ $detallefactura->nombre_producto }}</td>
                        <td class="table-light">{{ $detallefactura->precio_unitario }}</td>
                        <td class="table-light">{{ $detallefactura->cantidad_producto_factura }}</td>
                        <td class="table-light">{{ $detallefactura->total }}</td>
                    </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
