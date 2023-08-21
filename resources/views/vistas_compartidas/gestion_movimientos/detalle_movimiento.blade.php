@extends('layouts/layout')

@section('title', "Cash Inventory | Crear Movimiento")

@section('content')


    <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">
            

            <h1 class="titulo_modulo">MOVIMIENTOS</h1> 


            <br><br><br><br><br>

            
            
            <div class="row">

            <!-- ++++++++++++++++++++++++++++++ TABLA DE MOVIMIENTOS +++++++++++++++++++++++++++++++ -->
                <table class="table table-light table-striped">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <thead>
                            <tr class="table-dark">
                                <th class="table-dark" scope="col">ID del Movimiento</th> 
                                <th class="table-dark" scope="col">Nombre del Movimiento</th>
                                <th class="table-dark" scope="col">Tipo del Movimiento</th>
                                <th class="table-dark" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-light">
                                <td class="table-light">{{ $movimiento->id }}</td>
                                <td class="table-light">{{ $movimiento->nombre_movimiento }}</td>
                                <td class="table-light">{{ $movimiento->tipo_movimiento }}</td>
                                <td class="table-light">
                                    <a class="btn btn-warning" role="button" href="/gestion_movimientos"><i class="bi bi-arrow-left-square-fill"></i> Volver</a>
                                </td>
                            </tr>                                                      
                        </tbody>
                    </div>
                </table>

                <br><br>

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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detalle_movimientos as $detalle_movimiento)
                                    <tr class="table-light text-center">
                                        <td class="table-light">{{ $detalle_movimiento->nombre_producto }}</td>
                                        <td class="table-light">{{ $detalle_movimiento->cantidad_detalle_movimiento }}</td>
                                        <td class="table-light">$ {{ $detalle_movimiento->valor_detalle_movimiento }}</td> 
                                        <td class="table-light">{{ $detalle_movimiento->fecha_detalle_movimiento }}</td> 
                                    </tr>
                                @empty
                                
                                @endforelse
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
        </div>
    </div>

    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/datatables.min.js"></script> -->
    {{-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}


@endsection