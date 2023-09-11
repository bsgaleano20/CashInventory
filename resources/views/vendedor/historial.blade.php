@extends('layouts/layout')

@section('title', "Cash Inventory | Historial de facturas")

@section('content')

!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
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

@endsection