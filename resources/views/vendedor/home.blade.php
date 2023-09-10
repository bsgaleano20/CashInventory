@extends('layouts/layout')

@section('title', "Cash Inventory | Inicio")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ MODULO DE VENTAS +++++++++++++++++++++++++++++++ -->

    <div id="caja_venta">

        <!-- ++++++++++++++++++++++++++++++ CAJAS +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_left_ventas"></div>
        <div class="cuadro_right_white"></div>

        <!-- ++++++++++++++++++++++++++++++ CONTENEDOR CAJAS DE MODULOS +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_left_ventas_container">
            <h1 class="titulo_modulo">MODULOS</h1><br><br>

            <div class="d-grid gap-2">

                <!-- Button modal search product-->
                {{-- <a class="btn btn-warning btn-lg" role="button" data-bs-toggle="modal" data-bs-target="#searchProduct"><i class="bi bi-search"></i> Consultar producto</a> --}}
                <a class="btn btn-warning btn-lg" role="button" href="{{ route('buscar_producto.index') }}"><i class="bi bi-search"></i> Consultar producto</a>
                <a class="btn btn-warning btn-lg" role="button" href="historial.php"><i class="bi bi-clock-history"></i> Histotial de facturas</a>
                <a class="btn btn-warning btn-lg" role="button"  data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-circle"></i> Cancelar factura</a>

                <br>

                <div class="info_ventas">
                    <h3 class="text-center texto_modulo">Nit. 830814323</h3>
                    <h3 class="text-center texto_modulo">Cra 88c #52b -37 Bosa Brasil</h3>
                    <h3 class="text-center texto_modulo">Bogotá, Colombia</h3>
                    <h3 class="text-center texto_modulo">Resolución Dian: 124894165319841</h3>
                    <h3 class="text-center texto_modulo">Tel: 3118654242 - 7451620</h3>
                </div>
                



                <!------------------------- Modal search product ------------------------------->
                <div class="modal fade" id="searchProduct" tabindex="-1" aria-labelledby="searchProductLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Consultar Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">   
                                    <input type="text" class="form-control" placeholder="Codigo de barras">
                                    <button type="button" class="btn btn-warning" id="button-addon2"><i class="bi bi-search"></i> Buscar</button>
                                </div>
                                <br>
                                <table class="table table-light table-striped">
                                    <thead>
                                        <tr>
                                            <th class="table-dark" scope="col">Nombre</th>
                                            <th class="table-dark"scope="col">Precio Unitario</th>
                                            <th class="table-dark"scope="col">Cantidad en Tienda</th>
                                            <th class="table-dark"scope="col">Cantidad en Bodega</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-light">
                                            <td class="table-light">Block Cuadriculado</td>
                                            <td class="table-light">$7.000</td>
                                            <td class="table-light">80</td>
                                            <td class="table-light">150</td>
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
            </div>
        </div>

        <!-- ++++++++++++++++++++++++++++++ CONTENEDOR DE MODULO DE VENTAS +++++++++++++++++++++++++++++++ -->

        
        <div class="cuadro_right_white_container scroll">
            <div class="row">
                <div class="col-9">
                    <h3 class="text-center titulo_modulo_black">Factura #54376</h3><br>  
                </div>
                <div class="col-3 text-end">
                <button class="btn btn-warning"><i class="bi bi-printer-fill"></i></button>
                    <button class="btn btn-warning"><i class="bi bi-file-earmark-arrow-down-fill"></i></i></i> </button>
                    <button class="btn btn-warning"><i class="bi bi-eraser-fill"></i></i></button>
                </div>
            </div>
                
            <!-- ++++++++++++++++++++++++++++++ MENU DE OPCIONES +++++++++++++++++++++++++++++++ -->
            <div class="row">
                <div class="col-6">
                    <div class="input-group">   
                        <input type="text" class="form-control" placeholder="Codigo de barras">
                        <button type="button" class="btn btn-warning" id="button-addon2"><i class="bi bi-cart-plus-fill"></i> Agregar Producto</button>
                        
                    </div>
                </div>
                <div class="col-3">
                    <select class="form-select">
                        <option selected>Metodo de pago</option>
                        <option value="2">Efectivo</option>
                        <option value="3">Tarjeta de Credito</option>
                        <option value="4">Tarjeta Debito</option>
                        <option value="5">Nequi</option>
                        <option value="6">Daviplata</option>
                    </select>
                </div>

                <div class="col-3">
                    <select class="form-select">
                        <option selected>Vendedor</option>
                        <option value="2">1193149205</option>
                        <option value="3">79427554</option>
                        <option value="4">41308755</option>
                        <option value="5">24164352</option>
                    </select>
                </div>
            </div>
    
            <br>

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

            <!-- ++++++++++++++++++++++++++++++ TABLA DE PRODUCTOS EN FACTURA +++++++++++++++++++++++++++++++ -->

            <table class="table table-light table-striped scroll">
                <thead>
                    <tr>
                        <th class="table-dark"scope="col">Codigo de barras</th>
                        <th class="table-dark"scope="col">Nombre</th>
                        <th class="table-dark"scope="col">Precio Unitario</th>
                        <th class="table-dark"scope="col">Cantidad</th>
                        <th class="table-dark"scope="col">Total</th>
                        <th class="table-dark"scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-light">
                        <td class="table-light">788492808274</td>
                        <td class="table-light">Block Cuadriculado</td>
                        <td class="table-light text-end">$7.000</td>
                        <td class="table-light"><input class="input_productos text-end" type="number" value="2"></td>
                        <td class="table-light text-end">$14.000</td>
                        <td class="table-light"><button type="button" data-bs-toggle="modal" data-bs-target="#eliminarUsuario" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button></td>
                    </tr>
                    <tr class="table-light">
                        <td class="table-light">788492808145</td>
                        <td class="table-light">Marcador borrable NEGRO</td>
                        <td class="table-light text-end">$5.000</td>
                        <td class="table-light"><input class="input_productos text-end" type="number" value="4"></td>
                        <td class="table-light text-end" >$20.000</td>
                        <td class="table-light"><button type="button" data-bs-toggle="modal" data-bs-target="#eliminarUsuario" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button></td>
                    </tr>
                    <tr class="table-light">
                        <td class="table-light">788492800524</td>
                        <td class="table-light">Sticky Notes x100 hojas</td>
                        <td class="table-light text-end">$2.000</td>
                        <td class="table-light"><input class="input_productos text-end" type="number" value="1"></td>
                        <td class="table-light text-end">$2.000</td>
                        <td class="table-light"><button type="button" data-bs-toggle="modal" data-bs-target="#eliminarUsuario" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button></td>
                    </tr>
                </tbody>
            </table>

            <br>

            <!-- ++++++++++++++++++++++++++++++ TOTALES +++++++++++++++++++++++++++++++ -->

            <div class="row">
                <div class="col-6">
                    <table class="table table-light table-striped scroll">
                        <tbody>
                            <tr>
                                <td class="table-dark"scope="col">Valor recibido</td>
                                <td class="table-light text-end"><input type="text" value="$42.840" class="input_cambio text-end"></td>
                            </tr>
                            <tr>
                                <td class="table-dark"scope="col">Valor cambio</td>
                                <td class="table-light text-end"><input type="text" value="$0" class=" input_cambio text-end"></td>
                            </tr>
                        </tbody>
                    </table>           
                </div>
                <div class="col-6">
                    <table class="table table-light table-striped scroll">
                        <tbody>
                            <tr>
                                <td class="table-dark"scope="col">Parcial</td>
                                <td class="table-light text-end">$36.000</td>
                            </tr>
                            <tr>
                                <td class="table-dark"scope="col">IVA 19%</td>
                                <td class="table-light text-end">$6.840</td>
                            </tr>
                            <tr>
                                <td class="table-dark"scope="col">Total</td>
                                <td class="table-light text-end">$42.840</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-grid gap-2">
                        <button class="btn btn-warning btn-lg"><i class="bi bi-receipt"></i> FACTURAR</button>
                    </div>
            
            
        </div>
        <button type="button" id="fullscreen_button" class="btn btn-dark" onclick="openFullscreen(); exitFullscreen(); ChangeIcon();"><i id="fullscreen_icon" class="bi bi-fullscreen"></i></button>
        
    </div>
    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var elem = document.getElementById("caja_venta");
        var icon = document.getElementById("fullscreen_icon");
        var button_s = document.getElementById("fullscreen_button");

        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }
        }
        function exitFullscreen(){
            if (elem.exitFullscreen) {
                elem.exitFullscreen();
            } else if (elem.webkitexitFullscreen) { /* Safari */
                elem.webkitexitFullscreen();
            } else if (elem.msexitFullscreen) { /* IE11 */
                elem.msexitFullscreen();
            }
        }

        function ChangeIcon(){
            if(icon.className == "bi bi-fullscreen"){
                icon.className = "bi bi-fullscreen-exit";
            }
            else{
                icon.className = "bi bi-fullscreen";
            }
        };
    
    
    </script>
    
@endsection
