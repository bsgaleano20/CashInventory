@extends('layouts/layout')

@section('title', "Cash Inventory | Autorizaciones")

@section('content')

    {{-- ALERT MOVIMIENTO CREADO --}}
    @if (session('aprobacion_movimiento'))
        <div class="alert alert-success" role="alert">
            {{ session('aprobacion_movimiento') }}
        </div>
    @endif

    <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">                 

            <!-- ++++++++++++++++++++++++++++++ Opciones +++++++++++++++++++++++++++++++ -->

            <h1 class="titulo_modulo">AUTORIZACIONES</h1>

            <div class="col-5">
                <a class="btn btn-warning" role="button" href="{{ route('autorizacion.show') }}"><i class="bi bi-person-plus-fill"></i> Historial</a>
                <a class="btn btn-warning" role="button" href="/administrador/home"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
            </div>

            <br><br>
            <!-- ++++++++++++++++++++++++++++++ Contenido +++++++++++++++++++++++++++++++ -->

            <!-- ++++++++++++++++++++ Ventana Emergente de Rechazar movimiento +++++++++++++++++++++++ -->
            <div class="modal fade" id="Rechazar" tabindex="-1" aria-labelledby="RechazarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="RechazarLabel">RECHAZAR MOVIMIENTO</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Desea Rechazar este Movimiento?
                        </div>
                        <div class="modal-footer">
                            {{-- CERRAR VENTANA --}}
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                            {{-- ELIMINAR PRODUCTO --}}
                            <form action="{{ route('autorizacion.update', ['id' => 1] ) }}" id="boton_eliminar" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Rechazar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tabla_grande scroll" >
                <table class="table table-light table-striped">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <thead>
                            <tr class="table-dark"> 
                                <th class="table-dark" scope="col">Fecha</th>
                                <th class="table-dark" scope="col">Nombre de la autorizacion</th>
                                <th class="table-dark" scope="col">Bodegista</th>
                                <th class="table-dark" scope="col">Estado</th>
                                <th class="table-dark" scope="col">Autorizacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($autorizaciones as $autorizacion)
                                <tr class="table-light">
                                    <td class="table-light">{{ $autorizacion->updated_at }}</td>
                                    <td class="table-light">{{ $autorizacion->nombre_autorizacion }}</td>
                                    <td class="table-light">{{ $autorizacion->nombre_usuario }}</td>
                                    <td class="table-light">Pendiente</td>
                                    <td class="table-light">
                                        <form action="{{ route('autorizacion.store', $autorizacion->formatted_id) }}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aprobar</button>
                                        </form>
                                        {{-- <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Rechazar" data-id="{{ $autorizacion->id }}><i class="bi bi-x-square-fill"></i> Rechazar</a> --}}
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Rechazar" data-id="{{ $autorizacion->formatted_id }}"><i class="bi bi-clipboard-x-fill"></i></i> Rechazar</a>  
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
    {{-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}

    {{-- Se sobreescribe el ID que se envía en el modal para que el controlador reciba el id del elemento seleccionado  --}}
    <script>
        $(document).ready(function() { 
            $('#Rechazar').on('show.bs.modal', function(event) {
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

        









        