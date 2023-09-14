@extends('layouts/layout')

@section('title', "Cash Inventory | Historial de facturas")

@section('content')

 <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">
            
            <!-- ++++++++++++++++++++++++++++++ USUARIOS +++++++++++++++++++++++++++++++ -->
            <h1 class="titulo_modulo">Detalle factura</h1><br>
            <!-- ++++++++++++++++++++++++++++++ OPCIONES +++++++++++++++++++++++++++++++ -->
            <br> <br> <br>
            <div class="col-12">
                <a class="btn btn-warning" role="button" href="{{ route('historial_facturas.invoke') }}"><i class="bi bi-arrow-left-square-fill"></i> Volver al historial</a>
            </div>

            <br><br><br>


            <!-- +++++++++++++++++++++++++++++++ TABLA ++++++++++++++++++++++++++++++++++++++++ -->
            <div class="tabla scroll">
                <table class="table table-light table-striped">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <thead>
                            <tr class="table-dark"> 
                                <th class="table-dark" scope="col">Id factura</th>
                                <th class="table-dark" scope="col">Codigo de barras</th>
                                <th class="table-dark" scope="col">Nombre Producto</th>
                                <th class="table-dark" scope="col">Cantidad</th>
                                <th class="table-dark"scope="col">Valor unitario</th>
                                <th class="table-dark" scope="col">Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalle_facturas as $detalle_factura)
                                <tr class="table-light">
                                    <td class="table-light">{{ $detalle_factura->Factura_id_factura }}</td>
                                    <td class="table-light">{{ $detalle_factura->codigo_barras }}</td>
                                    <td class="table-light">{{ $detalle_factura->nombre_producto}}</td>
                                    <td class="table-light">{{ $detalle_factura->cantidad_producto_factura }}</td>
                                    <td class="table-light">$ {{ $detalle_factura->precio_unitario }}</td>
                                    <td class="table-light">$ {{ $detalle_factura->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
<!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/datatables.min.js"></script> -->
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

@endsection