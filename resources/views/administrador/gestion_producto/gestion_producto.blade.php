<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <title>Cash Inventory | Productos</title>
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
                <h1 class="titulo_modulo">PRODUCTOS</h1><br>
                <!-- ++++++++++++++++++++++++++++++ OPCIONES +++++++++++++++++++++++++++++++ -->
                <br> <br> <br>
                <div class="col-7">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Producto">
                        <select class="form-select">
                            <option selected>Filtro</option>
                            <option value="2">Id</option>
                            <option value="3">Nombre</option>
                            <option value="4">Codigo de barras</option>
                            <option value="5">Precio</option>
                            <option value="6">Cantidad en Tienda</option>
                            <option value="7">Cantidad en Bodega</option>
                        </select>
                        <button type="button" class="btn btn-warning" id="button-addon2">Buscar</button>
                    </div>
                </div>
                <div class="col-5">
                    <a class="btn btn-warning" role="button" href="crear_producto.php"><i class="bi bi-clipboard2-plus-fill"></i></i> Crear producto</a>
                    <a class="btn btn-warning" role="button" href="../home.php"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
                </div>

                <br><br><br>

                <!-- ++++++++++++++++++++ Ventana Emergente de eliminar producto +++++++++++++++++++++++ -->
                <div class="modal fade" id="eliminarUsuario" tabindex="-1" aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="eliminarUsuarioLabel">ELIMINAR PRODUCTO</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Desea eliminar este producto?
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
                                    <th class="table-dark" scope="col">Id</th>
                                    <th class="table-dark" scope="col">Nombre</th>
                                    <th class="table-dark" scope="col">Codigo de barras</th>
                                    <th class="table-dark"scope="col">Precio Unitario</th>
                                    <th class="table-dark"scope="col">Cantidad en Tienda</th>
                                    <th class="table-dark"scope="col">Cantidad en Bodega</th>
                                    <th class="table-dark"scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <td class="table-light">1</td>
                                    <td class="table-light">Block Cuadriculado</td>
                                    <td class="table-light">788492808274</td>
                                    <td class="table-light">$7.000</td>
                                    <td class="table-light">80</td>
                                    <td class="table-light">150</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_producto.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-clipboard-x-fill"></i></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">2</td>
                                    <td class="table-light">Marcador borrable NEGRO</td>
                                    <td class="table-light">788492808145</td>
                                    <td class="table-light">$5.000</td>
                                    <td class="table-light">150</td>
                                    <td class="table-light">300</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_producto.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-clipboard-x-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">3</td>
                                    <td class="table-light">Micropunta NEGRO</td>
                                    <td class="table-light">788492804163</td>
                                    <td class="table-light">$6.500</td>
                                    <td class="table-light">80</td>
                                    <td class="table-light">120</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_producto.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-clipboard-x-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">4</td>
                                    <td class="table-light">Cosedora</td>
                                    <td class="table-light">788492803548</td>
                                    <td class="table-light">$12.000</td>
                                    <td class="table-light">35</td>
                                    <td class="table-light">90</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_producto.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-clipboard-x-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">5</td>
                                    <td class="table-light">Pegante en barra PEGASTICK</td>
                                    <td class="table-light">788492822301</td>
                                    <td class="table-light">$4.500</td>
                                    <td class="table-light">105</td>
                                    <td class="table-light">230</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_producto.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-clipboard-x-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">6</td>
                                    <td class="table-light">Perforadora 2 huecos</td>
                                    <td class="table-light">788492802458</td>
                                    <td class="table-light">$9.800</td>
                                    <td class="table-light">40</td>
                                    <td class="table-light">22</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_producto.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-clipboard-x-fill"></i> Eliminar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">7</td>
                                    <td class="table-light">Cinta transparente ANCHA</td>
                                    <td class="table-light">788492808271</td>
                                    <td class="table-light">$6.000</td>
                                    <td class="table-light">48</td>
                                    <td class="table-light">92</td>
                                    <td class="table-light">
                                        <a type="button" href="crear_producto.php" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-clipboard-x-fill"></i> Eliminar</a>  
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