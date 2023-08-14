@extends('layouts/layout')

@section('title', "Cash Inventory | Crear Movimiento")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">
            

            <h1 class="titulo_modulo">MOVIMIENTOS</h1> 


            <br><br><br><br>

            <form action="{{ route('gestion_movimiento.store') }}" method="POST">
                @csrf
                <div class="row">

                    <!-- ++++++++++++++++++++++++++++++ TABLA DE MOVIMIENTOS +++++++++++++++++++++++++++++++ -->

                    <table class="table table-light table-striped">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                            <thead>
                                <tr class="table-dark">
                                    <th class="table-dark" scope="col">ID Temporal del Movimiento</th> 
                                    <th class="table-dark" scope="col">Nombre del Movimiento</th>
                                    <th class="table-dark" scope="col">Tipo del Movimiento</th>
                                    <th class="table-dark" scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <td class="table-light"><input type="text" class="form-control" name="nombre_temp" value="{{ $nombre_mov }}" disabled></td>
                                    <td class="table-light"><input type="text" class="form-control" name="nombre_movimiento" placeholder="Nombre del Movimiento"></td>
                                    <td class="table-light">
                                        <select class="form-select" name="tipo_movimiento" id="tipo_movimiento">
                                            <option value="" selected disabled hidden>Seleccione un tipo de movimiento</option>
                                            <option value="Tienda a Bodega">De Tienda a Bodega</option>
                                            <option value="Bodega a Tienda">De Bodega a Tienda</option>
                                            <option value="Ingreso">Nuevo Ingreso</option>
                                        </select>
                                    </td>
                                    <td class="table-light">
                                        <a class="btn btn-success" role="button" href="/gestion_movimientos"><i class="bi bi-check-circle-fill"></i></i> Guardar</a>
                                        <a class="btn btn-warning" role="button" href="/gestion_movimientos"><i class="bi bi-arrow-left-square-fill"></i> Volver</a>
                                    </td>
                                </tr>                                                      
                            </tbody>
                        </div>
                    </table>

                    <!-- ++++++++++++++++++++++++++++++ TABLA DE DETALLE MOVIMIENTOS +++++++++++++++++++++++++++++++ -->
                    <div class="tabla scroll">
                        <table class="table table-light table-striped">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <thead>
                                    <tr class="table-dark text-center"> 
                                        <th class="table-dark" scope="col">Nombre Producto</th>
                                        <th class="table-dark" scope="col">Cantidad a mover</th>
                                        <th class="table-dark" scope="col">Valor total del producto</th>
                                        <th class="table-dark" scope="col">Fecha</th>
                                        <th class="table-dark" scope="col">Buscar</th>
                                        <th class="table-dark" scope="col">Agregar</th>
                                        <th class="table-dark" scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-light">
                                        <td class="table-light"><input type="text" class="form-control" name="nombre_producto" placeholder="Producto" disabled></td>
                                        <td class="table-light"><input type="number" class="form-control" name="cantidad_movimiento" placeholder="Cantidad a mover"></td>
                                        <td class="table-light"><input type="number" class="form-control" name="valor_movimiento" placeholder="Valor total del producto"></td>
                                        <td class="table-light"><input type="date" class="form-control" name="fecha_movimiento" placeholder="Fecha"></td>
                                        <td class="table-light"><a role="button" class="btn btn-warning" href="/gestion_movimientos/crear_movimiento/buscar_productos" ><i class="bi bi-search"></i></a></td>
                                        <td class="table-light"><button type="button" class="btn btn-success"><i class="bi bi-clipboard2-plus-fill"></i></button></td>
                                        <td class="table-light"><button type="button" class="btn btn-danger"><i class="bi bi-x-lg"></i></button></td>
                                    </tr>                                                
                                </tbody>
                            </div>
                        </table>
                    </div>
                    

                    {{-- ALERT --}}
                    @if (session('crear_producto'))
                        <div class="alert alert-success" role="alert">
                            {{ session('crear_producto') }}
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/datatables.min.js"></script> -->
    {{-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}

@endsection