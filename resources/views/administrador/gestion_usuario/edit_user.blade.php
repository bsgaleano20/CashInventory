@extends('layouts/layout')

@section('title', "Cash Inventory | Editar Usuario")

@section('content')

<!-- ++++++++++++++++++++++++++++++ Caja semitransparente +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_center_container">
        <div class="row">
            <!-- ++++++++++++++++++++++++++++++ TITULO +++++++++++++++++++++++++++++++ -->

            <h1 class="titulo_modulo">USUARIOS</h1>
            
            <br><br><br><br>

            <form action="{{ route('gestion_usuario.update', $usuarios->id) }}" method="POST">
                @csrf
                <div class="row text-center">

                    <div class="col-6 form">

                        <!-- Name -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person-fill"></i></span>
                            {{-- <input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1"> --}}
                            <x-text-input id="name" class="form-control" placeholder="Nombre" value="{{ $usuarios->nombre_usuario }}" aria-describedby="basic-addon1" type="text" name="name"/>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="text-warning" />

                        <!-- Id -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge"></i></span>
                            {{-- <input type="text" class="form-control" placeholder="Documento" aria-label="Text input with dropdown button"> --}}
                            <x-text-input disabled id="id" class="form-control" placeholder="Documento" value="{{ $usuarios->id }}" type="text" name="id" />
                        </div>
                        <x-input-error :messages="$errors->get('id')" class="text-warning" />

                        <!-- Email Address -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                            {{-- <input type="text" class="form-control" placeholder="Correo" aria-describedby="basic-addon1"> --}}
                            <x-text-input id="email" class="form-control" placeholder="Correo" value="{{ $usuarios->email }}" type="email" name="email"/>
                        </div> 
                        <x-input-error :messages="$errors->get('email')" class="text-warning" />

                        <!-- celular -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                            {{-- <input type="text" class="form-control" placeholder="Telefono" aria-describedby="basic-addon1"> --}}
                            <x-text-input id="celular" class="form-control" placeholder="Telefono" value="{{ $usuarios->celular }}" type="text" name="celular" required autocomplete="celular" />
                        </div>
                        <x-input-error :messages="$errors->get('celular')" class="text-warning" />

                        <!-- ROL -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-fill-check"></i></span>
                            {{-- <select class="form-select">
                                <option selected>Rol</option>
                                <option value="2">Administrador</option>
                                <option value="3">Vendedor</option>
                                <option value="4">Bodeguista</option>
                            </select> --}}

                            <select class="form-select" name="Rol_id_rol" id="Rol_id_rol" class="block mt-1 w-full" required autocomplete="direccion" >
                                <option value="" hidden>Seleccione un Rol</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->Id_rol }}" 
                                        @if ($rol->nombre_rol == $usuario_y_rol->nombre_rol)
                                           selected
                                        @endif>
                                        {{ $rol->nombre_rol }}</option>
                                @endforeach
                            </select>    
                        </div>
                        <x-input-error :messages="$errors->get('Rol_id_rol')" class="text-warning" />
                    </div>


                    <div class="col-6">
                        {{-- <img src="/storage/img/inventario.jpg" class="img_ref1" width="500px"> --}}

                        <!-- Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                            {{-- <input type="text" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1"> --}}
                            <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Contraseña"
                                        required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="text-warning" />

                        <!-- Confirm Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                class="form-control"
                                placeholder="Confirmar contraseña"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-warning" />

                        <!-- Estado -->  
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-check"></i></i></span>
                            <select class="form-select" name="estado" required  >
                                <option Value="" hidden>Estado</option>
                                <option value="A" 
                                    @if ($usuarios->habilitado_usuario == "A")
                                        selected
                                    @endif
                                >Habilitado</option>
                                <option value="I"
                                    @if ($usuarios->habilitado_usuario == "I")
                                    selected
                                    @endif
                                >Deshabilitado</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('estado')" class="text-warning" />

                        <!-- Direccion -->  
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-map-fill"></i></span>
                            {{-- <input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1"> --}}
                            <x-text-input id="direccion" class="form-control" placeholder="Direccion" value="{{ $usuarios->direccion }}" aria-describedby="basic-addon1" type="text" name="direccion"/>
                        </div>
                        <x-input-error :messages="$errors->get('direccion')" class="text-warning" />
                        
                        {{-- opciones --}}
                        <div class="row text-center">
                            {{-- <div class="col-1"></div> --}}
                            <div class="col-1"></div>

                            <div class="col-4">
                                <form action="" method="POST"></form>
                                <div class="row"><input type="submit" class="btn btn-warning" value="Guardar"></div>
                            </div>
 
                            <div class="col-1"></div>

                            <div class="col-4">
                                <div class="row"><a class="btn btn-warning" role="button" href="/gestion_usuario"> Volver</a></div>
                            </div>

                            {{-- <div class="col-3">
                                <div class="row"><input class="btn btn-warning" type="reset" value="Borrar"></div>
                            </div> --}}
                            
                        </div>
                    </div>
                    <br>
                    {{-- ALERT --}}
                    @if (session('editar_usuario'))
                        <div class="alert alert-success" role="alert">
                            {{ session('editar_usuario') }}
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