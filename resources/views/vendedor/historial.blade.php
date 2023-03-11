<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <title>Cash Inventory | Historial</title>
        <link rel="shortcut icon" href="../../img/favicon.ico">
        <link rel="stylesheet" href="../../css/main.css">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
    </head>
    <body>
        <!-- ++++++++++++++++++++++++++++++ Navbar +++++++++++++++++++++++++++++++ -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- ++++++++++++++++++++++++++++++ Marca y Logo +++++++++++++++++++++++++++++++ -->
                <img src="../../img/moneda.png" class="icono_inicial">
                <a class="navbar-brand" id="marca" href="home.php">Cash Inventory</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- ++++++++++++++++++++++++++++++ Itenms Navbar +++++++++++++++++++++++++++++++ -->
                        <li class="nav-item dropdown" id="opciones">
                            <div class="dropdown-dropstart" >
                                <!-- ++++++++++++++++++++++++++++++ Opciones de Usuario +++++++++++++++++++++++++++++++ -->
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../img/usuario.png" alt="" class="foto_perfil" >
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="mi_perfil.php">Mi perfil</a></li>
                                    <li><a class="dropdown-item" href="../../index.php">Cerrar Sesión</a></li>
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
                <h1 class="titulo_modulo">FACTURAS</h1><br>
                <!-- ++++++++++++++++++++++++++++++ OPCIONES +++++++++++++++++++++++++++++++ -->
                <br> <br> <br>
                <div class="col-7">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Factura">
                        <select class="form-select">
                            <option selected>Filtro</option>
                            <option value="2">Número de factura</option>
                            <option value="3">Fecha</option>
                            <option value="4">Valor Total</option>
                        </select>
                        <button type="button" class="btn btn-warning" id="button-addon2">Buscar</button>
                    </div>
                </div>
                <div class="col-5">
                    <a class="btn btn-warning" role="button" href="home.php"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
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


                <!-- ++++++++++++++++++++ Ventana Emergente de detalle +++++++++++++++++++++++ -->
                <div class="modal fade" id="detalleFactura" tabindex="-1" aria-labelledby="detalleFacturaLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="eliminarUsuarioLabel">DETALLE FACTURA</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-light table-striped">
                                <thead>
                                    <tr>
                                        <th class="table-dark" scope="col">Producto</th>
                                        <th class="table-dark"scope="col">Precio Unitario</th>
                                        <th class="table-dark"scope="col">Cantidad</th>
                                        <th class="table-dark"scope="col">Precio total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-light">
                                        <td class="table-light">Marcador Sharpie</td>
                                        <td class="table-light">$2.700</td>
                                        <td class="table-light">1</td>
                                        <td class="table-light">$2.700</td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                                    <th class="table-dark"scope="col">Valor Recibido</th>
                                    <th class="table-dark"scope="col">Valor Cambio</th>
                                    <th class="table-dark" scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <td class="table-light">24522</td>
                                    <td class="table-light">21/11/2022</td>
                                    <td class="table-light">$ 15.300</td>
                                    <td class="table-light">$ 15.300</td>
                                    <td class="table-light">$ 0</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" data-bs-toggle="modal" data-bs-target="#detalleFactura" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-lg"></i> Cancelar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">24523</td>
                                    <td class="table-light">21/11/2022</td>
                                    <td class="table-light">$ 2.700</td>
                                    <td class="table-light">$ 5.000</td>
                                    <td class="table-light">$ 2.300</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" data-bs-toggle="modal" data-bs-target="#detalleFactura" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-lg"></i> Cancelar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">24524</td>
                                    <td class="table-light">21/11/2022</td>
                                    <td class="table-light">$ 26.100</td>
                                    <td class="table-light">$ 30.000</td>
                                    <td class="table-light">$ 3.900</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" data-bs-toggle="modal" data-bs-target="#detalleFactura" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-lg"></i> Cancelar</a>  
                                    </td> 
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">24525</td>
                                    <td class="table-light">21/11/2022</td>
                                    <td class="table-light">$ 34.900</td>
                                    <td class="table-light">$ 50.000</td>
                                    <td class="table-light">$ 15.100</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" data-bs-toggle="modal" data-bs-target="#detalleFactura" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-lg"></i> Cancelar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">24526</td>
                                    <td class="table-light">21/11/2022</td>
                                    <td class="table-light">$ 1.000</td>
                                    <td class="table-light">$ 1.000</td>
                                    <td class="table-light">$ 0</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" data-bs-toggle="modal" data-bs-target="#detalleFactura" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-lg"></i> Cancelar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">24527</td>
                                    <td class="table-light">22/11/2022</td>
                                    <td class="table-light">$ 700</td>
                                    <td class="table-light">$ 1.000</td>
                                    <td class="table-light">$ 300</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" data-bs-toggle="modal" data-bs-target="#detalleFactura" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-lg"></i> Cancelar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">24528</td>
                                    <td class="table-light">22/11/2022</td>
                                    <td class="table-light">$ 2.500</td>
                                    <td class="table-light">$ 10.000</td>
                                    <td class="table-light">$ 7.500</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_usuario.php" data-bs-toggle="modal" data-bs-target="#detalleFactura" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Detalle</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-lg"></i> Cancelar</a>  
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