<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <title>Cash Inventory | Crear Producto</title>
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
                <!-- ++++++++++++++++++++++++++++++ TITULO +++++++++++++++++++++++++++++++ -->

                <h1 class="titulo_modulo">PRODUCTOS</h1>
                
                <br><br><br><br>

                <form action="" method="POST">
                    <div class="row">
                        <div class="col-6">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Nombre del Producto" aria-describedby="basic-addon1">
                            </div> 

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-text-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Descripción" aria-describedby="basic-addon1">
                            </div> 

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-upc-scan"></i></span>
                                <input type="text" class="form-control" placeholder="Código Barras" aria-describedby="basic-addon1">
                            </div> 

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash-stack"></i></span>
                                <input type="text" class="form-control" placeholder="Valor unitario" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Proveedor" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-shop"></i></span>
                                <input type="number" class="form-control" placeholder="Cantidad en Tienda" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-archive-fill"></i></i></span>
                                <input type="number" class="form-control" placeholder="Cantidad en Bodega" aria-describedby="basic-addon1">
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <div class="row"><input type="submit" class="btn btn-warning" value="Guardar"></div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <div class="row"><a class="btn btn-warning" role="button" href="gestion_producto.php"> Volver</a></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <img src="../../../img/inventario2.jpg" width="600px">
                        </div>
                    </div>
                </form>
            </div>
        </div>
<!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/datatables.min.js"></script> -->
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>

    </body>
</html>