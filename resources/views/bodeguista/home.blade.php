<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <title>Cash Inventory | Inicio</title>
        <link rel="shortcut icon" href="../../img/favicon.ico">
        <link rel="stylesheet" href="../../css/main.css">
    </head>
    <body>
        <!-- ++++++++++++++++++++++++++++++ Navbar +++++++++++++++++++++++++++++++ -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- ++++++++++++++++++++++++++++++ Marca y Logo +++++++++++++++++++++++++++++++ -->
                <img src="../../img/moneda.png" class="icono_inicial">
                <a class="navbar-brand" id="marca" href="#">Cash Inventory</a>
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

        <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_left"></div>
        <div class="cuadro_right"></div>

        <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_left_container">

            <!-- ++++++++++++++++++++++++++++++ MODULOS +++++++++++++++++++++++++++++++ -->
            <h1 class="titulo_modulo">MODULOS</h1><br><br>
            <div class="d-grid gap-2">
                <a class="btn btn-warning btn-lg" role="button" href="gestion_producto/gestion_producto.php"><i class="bi bi-archive-fill"></i> Inventario</a>
                <a class="btn btn-warning btn-lg" role="button" href="autorizaciones/Autorizacion.php"><i class="bi bi-bookmark-check-fill"></i> Autorización de cambios </a>
            </div>
        </div>
        <div class="cuadro_right_container scroll">
            <!-- ++++++++++++++++++++++++++++++ HISTORIAL +++++++++++++++++++++++++++++++ -->
            <div class="row">
                <div class="col-2">
                    <br>
                    <button type="button" class="btn btn-warning btn-lg"><i class="bi bi-arrow-clockwise"></i>Actualizar</button> <br><br>
                </div>
                <div class="col-10">
                    <h1 class="titulo_modulo">ULTIMAS VENTAS</h1><br>
                </div>
            </div>


            <table class="table table-light table-striped">
                <thead>
                    <tr class="table-dark">
                        <th class="table-dark" scope="col">Fecha</th>
                        <th class="table-dark" scope="col">Hora</th>
                        <th class="table-dark" scope="col">Valor</th>
                        <th class="table-dark"scope="col">Elemento</th>
                        <th class="table-dark"scope="col">Cantidad</th>
                        <th class="table-dark"scope="col">Restantes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light">
                        <th class="table-light" scope="row">26/06/2022</th>
                        <td class="table-light">16:35</td>
                        <td class="table-light">5000</td>
                        <td class="table-light">Folder</td>
                        <td class="table-light">2</td>
                        <td class="table-light">29</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">26/06/2022</th>
                        <td class="table-light">11:52</td>
                        <td class="table-light">9300</td>
                        <td class="table-light">Marcadores Pelikan</td>
                        <td class="table-light">1</td>
                        <td class="table-light">53</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">25/06/2022</th>
                        <td class="table-light">19:22</td>
                        <td class="table-light">1200</td>
                        <td class="table-light">Esfero BIC</td>
                        <td class="table-light">1</td>
                        <td class="table-light">281</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">25/06/2022</th>
                        <td class="table-light">13:11</td>
                        <td class="table-light">6200</td>
                        <td class="table-light">Colbon SiPega</td>
                        <td class="table-light">2</td>
                        <td class="table-light">71</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">25/06/2022</th>
                        <td class="table-light">09:35</td>
                        <td class="table-light">9200</td>
                        <td class="table-light">Motor 3v</td>
                        <td class="table-light">3</td>
                        <td class="table-light">45</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">25/06/2022</th>
                        <td class="table-light">07:55</td>
                        <td class="table-light">3000</td>
                        <td class="table-light">Esfero Kilométrico</td>
                        <td class="table-light">3</td>
                        <td class="table-light">352</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">24/06/2022</th>
                        <td class="table-light">20:35</td>
                        <td class="table-light">3500</td>
                        <td class="table-light">Pilas AAA</td>
                        <td class="table-light">2</td>
                        <td class="table-light">123</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">24/06/2022</th>
                        <td class="table-light">15:52</td>
                        <td class="table-light">1500</td>
                        <td class="table-light">PegaStick en barra</td>
                        <td class="table-light">1</td>
                        <td class="table-light">63</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">24/06/2022</th>
                        <td class="table-light">13:35</td>
                        <td class="table-light">10500</td>
                        <td class="table-light">Set 12 Colores Faber Castell</td>
                        <td class="table-light">1</td>
                        <td class="table-light">115</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">24/06/2022</th>
                        <td class="table-light">11:22</td>
                        <td class="table-light">2300</td>
                        <td class="table-light">Cuaderno Norma 100pg</td>
                        <td class="table-light">1</td>
                        <td class="table-light">242</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">24/06/2022</th>
                        <td class="table-light">10:02</td>
                        <td class="table-light">3100</td>
                        <td class="table-light">Corrector Pelikan</td>
                        <td class="table-light">1</td>
                        <td class="table-light">35</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">24/06/2022</th>
                        <td class="table-light">08:14</td>
                        <td class="table-light">12500</td>
                        <td class="table-light">Cuaderno 5 Materias NORMA</td>
                        <td class="table-light">1</td>
                        <td class="table-light">34</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">23/06/2022</th>
                        <td class="table-light">16:42</td>
                        <td class="table-light">6100</td>
                        <td class="table-light">Motor 3v</td>
                        <td class="table-light">2</td>
                        <td class="table-light">47</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">23/06/2022</th>
                        <td class="table-light">13:01</td>
                        <td class="table-light">5500</td>
                        <td class="table-light">Plato Sopero</td>
                        <td class="table-light">1</td>
                        <td class="table-light">62</td>
                    </tr>
                    <tr class="table-light">
                        <th class="table-light" scope="row">23/06/2022</th>
                        <td class="table-light">10:00</td>
                        <td class="table-light">58300</td>
                        <td class="table-light">Maleta Toto</td>
                        <td class="table-light">1</td>
                        <td class="table-light">16</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
