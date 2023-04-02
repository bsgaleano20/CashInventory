@extends('layouts/layout')

@section('title', "Cash Inventory | Gestion de Usuario")

@section('content')

<!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">
            
            <!-- ++++++++++++++++++++++++++++++ USUARIOS +++++++++++++++++++++++++++++++ -->
            <h1 class="titulo_modulo">USUARIOS</h1><br>
            <!-- ++++++++++++++++++++++++++++++ OPCIONES +++++++++++++++++++++++++++++++ -->
            <br> <br> <br>
            <div class="col-7">
                <form action="{{ route('gestion_usuario.show') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="id" class="form-control" placeholder="Usuario" :value="old($busqueda)">
                        <select class="form-select" name="filtro">
                            <option value="id">Documento</option>
                            <option value="nombre_usuario">Nombre</option>
                            <option value="nombre_rol">Rol</option>
                            <option value="celular">Celular</option>
                            <option value="habilitado_usuario">Estado</option>
                        </select>
                        <button type="submit" class="btn btn-warning" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <a class="btn btn-warning" role="button" href="crear_usuario.php"><i class="bi bi-person-plus-fill"></i> Crear usuario</a>
                <a class="btn btn-warning" role="button" href="../home.php"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
            </div>

            <br><br><br>

            <!-- ++++++++++++++++++++ Ventana Emergente de eliminar usuario +++++++++++++++++++++++ -->
            <div class="modal fade" id="eliminarUsuario" tabindex="-1" aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="eliminarUsuarioLabel">ELIMINAR USUARIO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar este usuario?
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
                                <th class="table-dark" scope="col">Documento</th>
                                <th class="table-dark" scope="col">Nombre</th>
                                <th class="table-dark" scope="col">Email</th>
                                <th class="table-dark"scope="col">Rol</th>
                                <th class="table-dark"scope="col">Celular</th>
                                <th class="table-dark"scope="col">Estado</th>
                                <th class="table-dark" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $usuario)
                                <tr class="table-light">
                                    <td class="table-light">{{ $usuario->id }}</td>
                                    <td class="table-light">{{ $usuario->nombre_usuario }}</td>
                                    <td class="table-light">{{ $usuario->email }}</td>
                                    <td class="table-light">{{ $usuario->nombre_rol }}</td>
                                    <td class="table-light">{{ $usuario->celular }}</td>
                                    <td class="table-light">{{ $usuario->habilitado_usuario }}</td>
                                    <td class="table-light">

                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
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
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
@endsection