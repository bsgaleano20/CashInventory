@extends('layouts/layout')

@section('title', "Cash Inventory | Editar Producto")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
            <div class="cuadro_center"></div>

            <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
            <div class="cuadro_center_container">
                <div class="row">
                    <!-- ++++++++++++++++++++++++++++++ TITULO +++++++++++++++++++++++++++++++ -->

                    <h1 class="titulo_modulo">PRODUCTOS</h1>
                    
                    <br><br><br><br>

                    <form action="{{ route('gestion_inventario.update', $producto->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">

                                <!-- Nombre del Producto -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard-fill"></i></span>
                                    <input type="text" class="form-control" value="{{ $producto->nombre_producto }}" name="nombre" placeholder="Nombre del Producto" aria-describedby="basic-addon1">
                                </div>
                                <x-input-error :messages="$errors->get('nombre')" class="text-warning" /> 

                                <!-- Descripcion del Producto -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-text-fill"></i></span>
                                    <input type="text" class="form-control" value="{{ $producto->descripcion_producto }}" name="descripcion" placeholder="Descripción" aria-describedby="basic-addon1">
                                </div>
                                <x-input-error :messages="$errors->get('descripcion')" class="text-warning" />  

                                <!-- Codigo de Barras -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-upc-scan"></i></span>
                                    <input type="text" class="form-control" value="{{ $producto->codigo_barras }}" name="codigo_barras" placeholder="Código Barras" aria-describedby="basic-addon1">
                                </div>
                                <x-input-error :messages="$errors->get('codigo_barras')" class="text-warning" />

                                <!-- Precio Unitario -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-cash-stack"></i></span>
                                    <input type="text" class="form-control" value="{{ $producto->precio_unitario }}" name="precio" placeholder="Valor unitario" aria-describedby="basic-addon1">
                                </div>
                                <x-input-error :messages="$errors->get('precio')" class="text-warning" />    
                            </div>

                            <div class="col-6">
                                <!-- Proveedor -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge-fill"></i></span>
                                    <input type="text" class="form-control" value="{{ $producto->Proveedor }}" name="proveedor" placeholder="Proveedor" aria-describedby="basic-addon1">
                                </div>
                                <x-input-error :messages="$errors->get('proveedor')" class="text-warning" />

                                <!-- Cantidad en Tienda -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-shop"></i></span>
                                    <input type="number" class="form-control" value="{{ $producto->cantidad_disponible_t }}" name="cantidad_t" placeholder="Cantidad en Tienda" aria-describedby="basic-addon1">
                                </div>
                                <x-input-error :messages="$errors->get('cantidad_t')" class="text-warning" />

                                <!-- Cantidad en Bodega -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-archive-fill"></i></i></span>
                                    <input type="number" class="form-control" value="{{ $producto->cantidad_disponible_b }}" name="cantidad_b" placeholder="Cantidad en Bodega" aria-describedby="basic-addon1">
                                </div>
                                <x-input-error :messages="$errors->get('cantidad_b')" class="text-warning" />

                                <!-- OPCIONES -->
                                <div class="row">
                                    <div class="col-1"></div>

                                    <div class="col-4">
                                        <div class="row"><input type="submit" class="btn btn-warning" value="Guardar"></div>
                                    </div>

                                    <div class="col-1"></div>

                                    <div class="col-4">
                                        <div class="row"><a class="btn btn-warning" role="button" href="/gestion_inventario"> Volver</a></div>
                                    </div>
                                </div>

                                {{-- <img src="/storage/img/inventario2.jpg" width="600px"> --}}
                            </div>
                            {{-- ALERT --}}
                            @if (session('crear_producto'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('crear_producto') }}
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
    <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
            <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
            <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/datatables.min.js"></script> -->
            <script type="text/javascript" src="DataTables/datatables.min.js"></script>

@endsection