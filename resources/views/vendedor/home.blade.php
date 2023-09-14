@extends('layouts/layout')

@section('title', "Cash Inventory | Inicio")

@section('content')



    <!-- ++++++++++++++++++++++++++++++ MODULO DE VENTAS +++++++++++++++++++++++++++++++ -->

    <div id="caja_venta">

        {{-- ALERT PRODUCTO ACTUALIZADO --}}
        @if (session('editar_producto'))
        <div class="alert alert-success" role="alert">
            {{ session('editar_producto') }}
        </div>
        @endif

        {{-- ALERT PRODUCTO NO ENCONTRADO --}}
        @if (session('agregar_producto'))
        <div class="alert alert-warning" role="alert">
            {{ session('agregar_producto') }}
        </div>
        @endif

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
                <a class="btn btn-warning btn-lg" role="button" href="{{ route('historial_facturas.invoke') }}"><i class="bi bi-clock-history"></i> Histotial de facturas</a>
                <a class="btn btn-warning btn-lg" role="button"  data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><i class="bi bi-x-circle"></i> Cancelar factura</a>

                <br>

                <div class="info_ventas">
                    <h3 class="text-center texto_modulo">Nit. 830814323</h3>
                    <h3 class="text-center texto_modulo">Cra 88c #52b -37 Bosa Brasil</h3>
                    <h3 class="text-center texto_modulo">Bogotá, Colombia</h3>
                    <h3 class="text-center texto_modulo">Resolución Dian: 124894165319841</h3>
                    <h3 class="text-center texto_modulo">Tel: 3118654242 - 7451620</h3>
                </div>
                
            </div>
        </div>

        <!-- ++++++++++++++++++++ Ventana Emergente de eliminar producto +++++++++++++++++++++++ -->
        <div class="modal fade" id="eliminarUsuario" tabindex="-1" aria-labelledby="eliminarUsuarioLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminarUsuarioLabel">CANCELAR FACTURA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea cancelar esta factura?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <form action="{{ route('vendedor.destroy', $id_fact) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <!-- ++++++++++++++++++++++++++++++ CONTENEDOR DE MODULO DE VENTAS +++++++++++++++++++++++++++++++ -->

        
        <div class="cuadro_right_white_container scroll">
            <div class="row">
                <div class="col-9">
                    <h3 class="text-center titulo_modulo_black">Factura #{{ $id_fact }}</h3><br>  
                </div>
                <div class="col-3 text-end">
                    <button class="btn btn-warning"><i class="bi bi-printer-fill"></i></button>
                    <button class="btn btn-warning"><i class="bi bi-file-earmark-arrow-down-fill"></i> </button>
                </div>
            </div>
                
            <!-- ++++++++++++++++++++++++++++++ MENU DE OPCIONES +++++++++++++++++++++++++++++++ -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('vendedor.edit') }}" method="post">
                        @csrf
                        <input hidden name="id_factura" value="{{ $id_fact }}" >
                        <div class="input-group">   
                            <input type="text" name="codigo_barras" class="form-control" placeholder="Codigo de barras">
                            <button type="submit" class="btn btn-warning" id="button-addon2"><i class="bi bi-cart-plus-fill"></i> Agregar Producto</button>
                        </div>
                    </form>    
                </div>      
            </div>
    
            <br>

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
                        <th class="table-dark"scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle_facturas as $detalle_factura)
                        
                            <tr class="table-light">
                                <form action="{{ route('vendedor.update') }}" method="post">
                                    @csrf
                                    <input hidden name="id_producto" value="{{ $detalle_factura->Producto_id_producto }}">
                                    <input hidden name="id_factura" value="{{ $detalle_factura->Factura_id_factura }}">
                                    {{-- <input hidden name="id_factura" value="{{ $id_fact }}" > --}}
                                    <td class="table-light">{{ $detalle_factura->codigo_barras }}</td>
                                    <td class="table-light">{{ $detalle_factura->nombre_producto }}</td>
                                    <td class="table-light text-end">${{ $detalle_factura->precio_unitario }}</td>
                                    <input hidden name="precio_unitario" value="{{ $detalle_factura->precio_unitario }}">
                                    <td class="table-light"><input class="input_productos text-end" type="number" name="cantidad_producto_factura" value="{{ $detalle_factura->cantidad_producto_factura }}"></td>
                                    <td class="table-light text-end">${{ $detalle_factura->total }}</td>
                                    <input hidden name="total_producto" value="{{ $detalle_factura->total }}">
                                    <td class="table-light">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check"></i></button>
                                    </td>
                                </form>
                                <td class="table-light">
                                    <form action="{{ route('vendedor.create') }}" method="post">
                                        @csrf
                                        <input hidden name="id_factura_eliminar" value="{{ $detalle_factura->Factura_id_factura }}">
                                        <input hidden name="id_producto_eliminar" value="{{ $detalle_factura->Producto_id_producto }}">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                              
                    @endforeach

                </tbody>
            </table>

            <br>

            <!-- ++++++++++++++++++++++++++++++ TOTALES +++++++++++++++++++++++++++++++ -->

            <div class="row">
                <div class="col-6">
                    <table class="table table-light table-striped scroll" >
                        <tbody>
                            <tr>
                                <form action="{{ route('vendedor.show') }}" method="post">
                                    @csrf
                                    <input hidden name="id_factura" value="{{ $id_fact }}" >
                                    <td class="table-dark"scope="col">Valor recibido</td>
                                    <td class="table-light text-end"><input type="text" name="valor_recibido" placeholder="$0" class="input_cambio text-end"></td>
                                    <td class="table-dark" rowspan="2"><button class="btn btn-success"><i class="bi bi-currency-dollar"></i></button></td>
                                </form>
                                        
                            </tr>
                            <tr>
                                <td class="table-dark"scope="col">Valor cambio</td>
                                <td class="table-light text-end">{{ $valor_cambio }}</td>
                            </tr>
                        </tbody>
                    </table>           
                </div>
                <div class="col-6">
                    <table class="table table-light table-striped scroll">
                        <tbody>
                            <tr>
                                <td class="table-dark"scope="col">Parcial</td>
                                <td class="table-light text-end">${{ $parcial_factura }}</td>
                            </tr>
                            <tr>
                                <td class="table-dark"scope="col">IVA 19%</td>
                                <td class="table-light text-end">${{ $iva }}</td>
                            </tr>
                            <tr>
                                <td class="table-dark"scope="col">Total</td>
                                <td class="table-light text-end">${{ $total_factura }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('vendedor.store') }}" method="post">
                @csrf
                <input hidden name="vendedor" value="{{ auth()-> user()->id; }}">
                <input hidden name="id_factura" value="{{ $id_fact }}" > 
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning btn-lg"><i class="bi bi-receipt"></i> FACTURAR</button>
                </div>
            </form>
            
            
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
