@extends('layouts/layout')

@section('title', "Cash Inventory | Gestion de Movimientos")

@section('content')

{{-- ALERT MOVIMIENTO CREADO --}}
@if (session('crear_movimiento'))
    <div class="alert alert-success" role="alert">
        {{ session('crear_movimiento') }}
    </div>
@endif

{{-- ALERT MOVIMIENTO ELIMINADO --}}
@if (session('eliminar_movimiento'))
    <div class="alert alert-success" role="alert">
        {{ session('eliminar_movimiento') }}
    </div>
@endif

    <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
            <div class="cuadro_center"></div>

            <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
            <div class="cuadro_center_container">
                <div class="row">
                    
                    <!-- ++++++++++++++++++++++++++++++ MOVIMIENTOS +++++++++++++++++++++++++++++++ -->
                    <h1 class="titulo_modulo">MOVIMIENTOS DE MERCANCIA</h1><br>
                    <!-- ++++++++++++++++++++++++++++++ OPCIONES +++++++++++++++++++++++++++++++ -->
                    <br> <br> <br>
                    <div class="col-7">
                        <form action="/gestion_movimientos" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Movimiento">
                                <select class="form-select" name="filtro">
                                    <option value="id">Id</option>
                                    <option value="nombre_movimiento">Nombre del Movimiento</option>
                                    <option value="tipo_movimiento">Tipo de Movimiento</option>
                                </select>
                                <button type="submit" class="btn btn-warning" id="button-addon2">Buscar</button>
                            </div>
                        </form>            
                    </div>
                    <div class="col-5">
                        <a class="btn btn-warning" role="button" href="/gestion_movimientos/crear_movimiento"><i class="bi bi-truck-front-fill"></i> Crear Movimiento</a>
                        <a class="btn btn-warning" role="button" href="/administrador/home"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
                    </div>

                    <br><br><br>

                    <!-- ++++++++++++++++++++ Ventana Emergente de eliminar movimiento +++++++++++++++++++++++ -->
                    <div class="modal fade" id="eliminarMovimiento" tabindex="-1" aria-labelledby="eliminarMovimientoLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="eliminarMovimientoLabel">ELIMINAR MOVIMIENTO</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Desea eliminar este Movimiento?
                            </div>
                            <div class="modal-footer">
                                {{-- CERRAR VENTANA --}}
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                                {{-- ELIMINAR PRODUCTO --}}
                                <form action="{{ route('gestion_movimiento.destroy', ['id' => 1] ) }}" id="boton_eliminar" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                                
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
                                        <th class="table-dark" scope="col">Id</th>
                                        <th class="table-dark" scope="col">Nombre del Movimiento</th>
                                        <th class="table-dark" scope="col">Tipo del Movimiento</th>
                                        <th class="table-dark"scope="col">Editar</th>
                                        <th class="table-dark"scope="col">Mas info</th>
                                        <th class="table-dark"scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($movimientos as $movimiento)
                                        <tr class="table-light">
                                            <td class="table-light">{{ $movimiento->id }}</td>
                                            <td class="table-light">{{ $movimiento->nombre_movimiento }}</td>
                                            <td class="table-light">{{ $movimiento->tipo_movimiento }}</td>
                                            <td class="table-light">
                                                <form action="{{ route('gestion_inventario.edit', $movimiento->id)}}" method="GET">
                                                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</button>
                                                </form>
                                            </td>
                                            <td class="table-light">
                                                <form action="{{ route('detalle_movimiento.invoke', $movimiento->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info"><i class="bi bi-clipboard2-plus-fill"></i> Mas info</button>
                                                </form>
                                            </td>
                                            <td class="table-light">
                                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarMovimiento" data-id="{{ $movimiento->id }}"><i class="bi bi-clipboard-x-fill"></i></i> Eliminar</a>
                                            </td>
                                            
                                                  
                                            
                                        </tr> 
                                    @empty
                                        
                                    @endforelse
                                                  
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
            {{-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}


            {{-- Se sobreescribe el ID que se envía en el modal para que el controlador reciba el id del elemento seleccionado  --}}
            <script>
                $(document).ready(function() { 
                    $('#eliminarMovimiento').on('show.bs.modal', function(event) {
                        var boton = $(event.relatedTarget); // Botón que disparó el modal
                        var id = boton.data('id'); // Extraer el ID del botón
                        var form = $('#boton_eliminar'); // Formulario de eliminación
                        var url = form.attr('action').replace(/(\d+)/, id); // Construir la URL de eliminación con el ID
        
                        console.log("ID: " + id);
                        form.attr('action', url); // Actualizar la URL del formulario
                    });
                });
            </script>
        
@endsection