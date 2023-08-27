@extends('layouts/layout')

@section('title', "Cash Inventory | Gestion de Autorizaciones")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

        <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_center_container">
            <div class="row">    

                <h1 class="titulo_modulo">AUTORIZACIONES</h1>

            
                <!-- ++++++++++++++++++++++++++++++ Opciones +++++++++++++++++++++++++++++++ -->

                <div class="col-5">
                    <a class="btn btn-warning" role="button" href="{{ route('autorizacion.index') }}"><i class="bi bi-arrow-left-square-fill"></i> Volver </a>
                </div>

                <br><br><br>    

                <!-- ++++++++++++++++++++++++++++++ Contenido +++++++++++++++++++++++++++++++ -->

                <div class="tabla scroll">
                    <table class="table table-light table-striped">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                            <thead>
                                <tr class="table-dark"> 
                                    <th class="table-dark" scope="col">Id</th>
                                    <th class="table-dark" scope="col">Nombre de la autorizacion</th>
                                    <th class="table-dark" scope="col">Bodegista</th>
                                    <th class="table-dark" scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historial as $historialItem)
                                    <tr class="table-light">
                                        <td class="table-light">{{ $historialItem->updated_at }}</td>
                                        <td class="table-light">{{ $historialItem->nombre_autorizacion }}</td>
                                        <td class="table-light">{{ $historialItem->nombre_usuario }}</td>
                                        @if ($historialItem->aprobacion_autorizacion == "A")
                                            <td class="table-light">Aprobado</td>
                                        @else
                                            <td class="table-light">Rechazado</td>
                                        @endif
                                        
                                    </tr>
                                @endforeach 
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection        


        