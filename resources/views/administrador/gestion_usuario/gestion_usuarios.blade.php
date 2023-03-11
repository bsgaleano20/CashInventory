<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <title>Cash Inventory | Usuarios</title>
        <link rel="shortcut icon" href="../../../img/favicon.ico">
        <link rel="stylesheet" href="../../../css/main.css">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
    </head>
    <body>
        <!-- ++++++++++++++++++++++++++++++ Navbar +++++++++++++++++++++++++++++++ -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- ++++++++++++++++++++++++++++++ Marca y Logo +++++++++++++++++++++++++++++++ -->
                <img src="../../../img/moneda.png" class="icono_inicial">
                <a class="navbar-brand" id="marca" href="../home.php">Cash Inventory</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- ++++++++++++++++++++++++++++++ Itenms Navbar +++++++++++++++++++++++++++++++ -->
                        <li class="nav-item dropdown" id="opciones">
                            <div class="dropdown-dropstart" >
                                <!-- ++++++++++++++++++++++++++++++ Opciones de Usuario +++++++++++++++++++++++++++++++ -->
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../../img/usuario.png" alt="" class="foto_perfil" >
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="../mi_perfil.php">Mi perfil</a></li>
                                    <li><a class="dropdown-item" href="../../../index.php">Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ++++++++++++++++++++++++++++++ Configuración +++++++++++++++++++++++++++++++ -->
                        <li class="nav-item">
                            <a href="#" class="conf_icon" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-gear"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- ++++++++++++++++++++++++++++++ Ventana Emergente de configuración +++++++++++++++++++++++++++++++ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Configuración</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Habilitar notificaciones
                        <select class="form-select" id="inputGroupSelect01" aria-label="Example select with button addon">
                            <option selected>SI</option>
                            <option value="1">NO</option>
                        </select><br>
                        Notificarme ingresos después de X productos
                        <select class="form-select" id="inputGroupSelect02" aria-label="Example select with button addon">
                            <option selected>10</option>
                            <option value="2">20</option>
                            <option value="2">30</option>
                            <option value="2">40</option>
                            <option value="2">50</option>
                            <option value="2">100</option>
                            <option value="2">Nunca</option>
                        </select><br>
                        Notificarme salidas después de X productos
                        <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                            <option selected>10</option>
                            <option value="2">20</option>
                            <option value="2">30</option>
                            <option value="2">40</option>
                            <option value="2">50</option>
                            <option value="2">100</option>
                            <option value="2">Nunca</option>
                        </select><br>
                        Notificarme pocas unidades
                        <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                            <option selected>10</option>
                            <option value="2">20</option>
                            <option value="2">30</option>
                            <option value="2">40</option>
                            <option value="2">50</option>
                            <option value="2">100</option>
                            <option value="2">Nunca</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>

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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Usuario">
                        <select class="form-select">
                            <option selected>Filtro</option>
                            <option value="2">Documento</option>
                            <option value="3">Nombre</option>
                            <option value="4">Rol</option>
                            <option value="5">Celular</option>
                            <option value="6">Estado</option>
                        </select>
                        <button type="button" class="btn btn-warning" id="button-addon2">Buscar</button>
                    </div>
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
                                <tr class="table-light">
                                    <td class="table-light">1193149506</td>
                                    <td class="table-light">Brayan Galeano</td>
                                    <td class="table-light">brayan.galeano@cashinventory.com</td>
                                    <td class="table-light">Administrador</td>
                                    <td class="table-light">3202707745</td>
                                    <td class="table-light">Activo</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">1010247854</td>
                                    <td class="table-light">Carol Muñoz</td>
                                    <td class="table-light">carol.munoz@cashinventory.com</td>
                                    <td class="table-light">Vendedor</td>
                                    <td class="table-light">3193574635</td>
                                    <td class="table-light">Activo</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">79454232</td>
                                    <td class="table-light">Carlos Soler</td>
                                    <td class="table-light">carlos.soler@cashinventory.com</td>
                                    <td class="table-light">Administrador</td>
                                    <td class="table-light">3112846541</td>
                                    <td class="table-light">Inactivo</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
                                    </td> 
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">41525634</td>
                                    <td class="table-light">Andres Salinas</td>
                                    <td class="table-light">andres.salinas@cashinventory.com</td>
                                    <td class="table-light">Bodeguista</td>
                                    <td class="table-light">3152220898</td>
                                    <td class="table-light">Activo</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">24198203</td>
                                    <td class="table-light">Michael Cuervo</td>
                                    <td class="table-light">michael.cuervo@cashinventory.com</td>
                                    <td class="table-light">Bodeguista</td>
                                    <td class="table-light">3152220898</td>
                                    <td class="table-light">Activo</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">1143323456</td>
                                    <td class="table-light">Kelly Herrera</td>
                                    <td class="table-light">kelly.herrera@cashinventory.com</td>
                                    <td class="table-light">Vendedor</td>
                                    <td class="table-light">3193576565</td>
                                    <td class="table-light">Inactivo</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">41322545</td>
                                    <td class="table-light">Diana Morales</td>
                                    <td class="table-light">diana.morales@cashinventory.com</td>
                                    <td class="table-light">Bodeguista</td>
                                    <td class="table-light">3225374323</td>
                                    <td class="table-light">Activo</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-person-dash-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
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

    </body>
</html>