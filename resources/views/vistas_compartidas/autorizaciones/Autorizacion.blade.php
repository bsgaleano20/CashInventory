<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <title>Cash Inventory | Inicio</title>
        <link rel="shortcut icon" href="../../../img/favicon.ico">
        <link rel="stylesheet" href="../../../css/main.css">
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

        <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_center"></div>

        <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_center_container">
            <div class="row">                 

                <!-- ++++++++++++++++++++++++++++++ Opciones +++++++++++++++++++++++++++++++ -->

                <div class="col-5">
                    <a class="btn btn-warning" role="button" href="Autorizacionhistorial.php"><i class="bi bi-person-plus-fill"></i> Historial</a>
                    <a class="btn btn-warning" role="button" href="../home.php"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
                </div>

        <!-- ++++++++++++++++++++++++++++++ Contenido +++++++++++++++++++++++++++++++ -->
        
                    <table class="table table-light table-striped">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                            <thead>
                                <tr class="table-dark"> 
                                    <th class="table-dark" scope="col">Fecha</th>
                                    <th class="table-dark" scope="col">Id producto</th>
                                    <th class="table-dark" scope="col">Nombre producto</th>
                                    <th class="table-dark" scope="col">Bodegista</th>
                                    <th class="table-dark"scope="col">Cantidad</th>
                                    <th class="table-dark"scope="col">Estado</th>
                                    <th class="table-dark" scope="col">Autorizacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <td class="table-light">24/08/2022</td>
                                    <td class="table-light">788492803548</td>
                                    <td class="table-light">Cosedora</td>
                                    <td class="table-light">Jeisson Arias</td>
                                    <td class="table-light">21</td>
                                    <td class="table-light">En espera</td>
                                    <td class="table-light">
                                        <a type="button" href="" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aceptar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Rechazar"><i class="bi bi-x-square-fill"></i> Rechazar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">22/08/2022</td>
                                    <td class="table-light">788492808274</td>
                                    <td class="table-light">Block cuadriculadoz</td>
                                    <td class="table-light">Andrey Barrera</td>
                                    <td class="table-light">50</td>
                                    <td class="table-light">En espera</td>
                                    <td class="table-light">
                                        <a type="button" href="" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aceptar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-square-fill"></i> Rechazar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">22/08/2022</td>
                                    <td class="table-light">788492808145</td>
                                    <td class="table-light">Marcador borrable NEGRO</td>
                                    <td class="table-light">Andrey Barrera</td>
                                    <td class="table-light">25</td>
                                    <td class="table-light">En espera</td>
                                    <td class="table-light">
                                        <a type="button" href="" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aceptar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-square-fill"></i> Rechazar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">21/08/2022</td>
                                    <td class="table-light">788492808271</td>
                                    <td class="table-light">Cinta transparente ANCHA</td>
                                    <td class="table-light">Andrey Barrera</td>
                                    <td class="table-light">62</td>
                                    <td class="table-light">En espera</td>
                                    <td class="table-light">
                                        <a type="button" href="" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aceptar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-square-fill"></i> Rechazar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">19/08/2022</td>
                                    <td class="table-light">788492807452</td>
                                    <td class="table-light">Resma papel 500 hojas A4</td>
                                    <td class="table-light">Jeisson Arias</td>
                                    <td class="table-light">48</td>
                                    <td class="table-light">En espera</td>
                                    <td class="table-light">
                                        <a type="button" href="" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aceptar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-square-fill"></i> Rechazar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">18/08/2022</td>
                                    <td class="table-light">788492808278</td>
                                    <td class="table-light">Resaltador</td>
                                    <td class="table-light">Jeisson Arias</td>
                                    <td class="table-light">58</td>
                                    <td class="table-light">En espera</td>
                                    <td class="table-light">
                                        <a type="button" href="" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aceptar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-square-fill"></i> Rechazar</a>  
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <td class="table-light">18/08/2022</td>
                                    <td class="table-light">788492803030</td>
                                    <td class="table-light">Gancho Legajador</td>
                                    <td class="table-light">Jeisson Arias</td>
                                    <td class="table-light">75</td>
                                    <td class="table-light">En espera</td>
                                    <td class="table-light">
                                        <a type="button" href="" class="btn btn-primary"><i class="bi bi-check-square-fill"></i> Aceptar</a>
                                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-square-fill"></i></i> Rechazar</a>  
                                    </td>
                                </tr>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
        

        









        