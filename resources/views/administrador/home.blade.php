@extends('layouts/layout')

@section('title', "Cash Inventory | Inicio")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_left"></div>
    <div class="cuadro_right"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_left_container">

        <!-- ++++++++++++++++++++++++++++++ MODULOS +++++++++++++++++++++++++++++++ -->
        <h1 class="titulo_modulo">MODULOS</h1><br><br>
        <div class="d-grid gap-2">
            <a class="btn btn-warning btn-lg" role="button" href="/gestion_usuario"><i class="bi bi-people-fill"></i> Gestión de usuarios</a>
            <a class="btn btn-warning btn-lg" role="button" href="/gestion_inventario"><i class="bi bi-archive-fill"></i> Inventario</a>
            <a class="btn btn-warning btn-lg" role="button" href="Reporte.php"><i class="bi bi-bar-chart-line-fill"></i> Reportes</a>
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

@endsection
