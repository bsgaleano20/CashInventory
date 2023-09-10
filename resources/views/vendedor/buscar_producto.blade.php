@extends('layouts/layout')

@section('title', "Cash Inventory | Crear Movimiento")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">  

            <h1 class="titulo_modulo">CONSULTAR PRODUCTO</h1>
            
            <br><br>

            <!-- ++++++++++++++++++++++++++++++ OPCIONES +++++++++++++++++++++++++++++++ -->
            <br> <br> 
            <div class="col-10">
                <form action="{{ route('buscar_producto.show') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Producto">
                        <select class="form-select" name="filtro" required>
                            <option value="id">Id</option>
                            <option value="nombre_producto">Nombre</option>
                            <option value="codigo_barras">Codigo de barras</option>
                        </select>
                        <button type="submit" class="btn btn-warning" id="button-addon2">Buscar</button>
                    </div>
                </form>            
            </div>
            <div class="col-2">
                <a class="btn btn-warning" role="button" href="{{ route('vendedor') }}"><i class="bi bi-arrow-left-square-fill"></i> Volver</a>
            </div>

            <br><br><br>
            <form action="/gestion_movimientos/crear_movimiento" method="GET">
                <div class="tabla scroll">
                    <table class="table table-light table-striped">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                            <thead>
                                <tr class="table-dark"> 
                                    <th class="table-dark" scope="col">Id</th>
                                    <th class="table-dark" scope="col">Nombre</th>
                                    <th class="table-dark" scope="col">Codigo de barras</th>
                                    <th class="table-dark"scope="col">Precio Unitario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($productos as $producto)
                                    <tr class="table-light">
                                        <td class="table-light">{{ $producto->id }}</td>
                                        <td class="table-light">{{ $producto->nombre_producto }}</td>
                                        <td class="table-light">{{ $producto->codigo_barras }}</td>
                                        <td class="table-light">${{ + $producto->precio_unitario }}</td>
                                    </tr> 
                                @empty
                                    
                                @endforelse                       
                            </tbody>
                        </div>
                    </table>
                </div>
                <br><br><br><br>    
            </form>
        </div>
    </div>
    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/datatables.min.js"></script> -->
    {{-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}

@endsection