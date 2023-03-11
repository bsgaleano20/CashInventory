<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <title>INICIO</title>
        <link rel="shortcut icon" href="../../img/favicon.ico">
        <link rel="stylesheet" href="../../css/main.css">
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
        <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_left"></div>
        <div class="cuadro_right"></div>

        <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_left_container">

            <!-- ++++++++++++++++++++++++++++++ MODULOS +++++++++++++++++++++++++++++++ -->
            <h1 class="titulo_modulo"></h1><br><br>
            <div class="d-grid gap-2">
                <a class="btn btn-warning btn-lg" role="button"><i class="bi bi-clipboard2-data-fill"></i> Reporte de ventas</a>
                <br>
                <a class="btn btn-warning btn-lg" role="button"><i class="bi bi-archive-fill"></i> Productos mas vendidos</a>
                <br>
                <a class="btn btn-warning btn-lg" role="button"><i class="bi bi-bar-chart-line-fill"></i>Reporte vendedores</a>
                <br>
                <a class="btn btn-warning btn-lg" role="button"><i class="bi bi-currency-dollar"></i>Reporte de Gastos</a>
            </div>
        </div>
        <div class="cuadro_right_container">
            <!-- ++++++++++++++++++++++++++++++ HISTORIAL +++++++++++++++++++++++++++++++ -->
            <div class="col-12 text-end">
                        <button class="btn btn-warning"><i class="bi bi-printer-fill"></i></button>
                        <button class="btn btn-warning"><i class="bi bi-file-earmark-arrow-down-fill"></i></i></i> </button>
                        <button class="btn btn-warning"><i class="bi bi-eraser-fill"></i></i></button>
                        <button class="btn btn-warning"><i class="bi bi-arrow-clockwise"></i></i></i></button>
            </div>
            <br>         
            <img src="../../img/grafica.jpg"class="img_ref1" alt="...">
        </div> 
		</section>
        <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>
</html>