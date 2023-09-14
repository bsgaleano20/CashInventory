@extends('layouts/layout')

@section('title', "Cash Inventory | Historial de facturas")

@section('content')

 <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">
            
            <!-- ++++++++++++++++++++++++++++++ USUARIOS +++++++++++++++++++++++++++++++ -->
            <h1 class="titulo_modulo">FACTURAS</h1><br>
            <!-- ++++++++++++++++++++++++++++++ OPCIONES +++++++++++++++++++++++++++++++ -->
            <br> <br> <br>
            <div class="col-7">
                <form action="{{ route('historial_facturas.show') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="busqueda" class="form-control" placeholder="Factura">
                        <select class="form-select" name="filtro" required>
                            <option disabled hidden>Filtro</option>
                            <option value="id">Número de factura</option>
                            <option value="created_at">Fecha</option>
                            <option value="valor_total_factura">Valor Total</option>
                        </select>
                        <button type="submit" class="btn btn-warning" id="button-addon2">Buscar</button>
                    </div>
                </form>
                
            </div>
            <div class="col-5">
                <a class="btn btn-warning" role="button" href="{{ route('vendedor') }}"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
            </div>

            <br><br><br>

            <!-- ++++++++++++++++++++ Ventana Emergente de eliminar factura +++++++++++++++++++++++ -->
            <div class="modal fade" id="eliminarUsuario" tabindex="-1" aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="eliminarUsuarioLabel">ELIMINAR FACTURA</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar esta factura?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- +++++++++++++++++++++++++++++++ TABLA ++++++++++++++++++++++++++++++++++++++++ -->
            <div class="tabla scroll">
                <table class="table table-light table-striped">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <thead>
                            <tr class="table-dark"> 
                                <th class="table-dark" scope="col">Número de factura</th>
                                <th class="table-dark" scope="col">Fecha</th>
                                <th class="table-dark" scope="col">Valor Total</th>
                                <th class="table-dark"scope="col">Cedula Vendedor</th>
                                <th class="table-dark" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)
                                <tr class="table-light">
                                    <td class="table-light">{{ $factura->id }}</td>
                                    <td class="table-light">{{ $factura->created_at}}</td>
                                    <td class="table-light">$ {{ $factura->valor_total_factura }}</td>
                                    <td class="table-light">{{ $factura->Vendedor_id_usuario }}</td>
                                    <td class="table-light">
                                        <form action="{{ route('historial_facturas.detalle_factura', $factura->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</button>
                                        </form>
                                        
                                    </td>
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