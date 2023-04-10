@extends('layouts/layout')

@section('title', "Cash Inventory | Gestion de Autorizaciones")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">                 

            <!-- ++++++++++++++++++++++++++++++ Opciones +++++++++++++++++++++++++++++++ -->

            <div class="col-5">
                <a class="btn btn-warning" role="button" href="Autorizacionhistorial.php"><i class="bi bi-person-plus-fill"></i> Historial</a>
                <a class="btn btn-warning" role="button" href="/administrador/home"><i class="bi bi-arrow-left-square-fill"></i> Volver al menú principal</a>
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
@endsection        

        









        