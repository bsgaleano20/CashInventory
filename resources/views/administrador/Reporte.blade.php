@extends('layouts/layout')

@section('title', "Cash Inventory | Reportes")

@section('content')

    <!-- ++++++++++++++++++++++++++++++ Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_left"></div>
    <div class="cuadro_right_white_2"></div>

    <!-- ++++++++++++++++++++++++++++++ Contenedores Cajas semitransparentes +++++++++++++++++++++++++++++++ -->
    <div class="cuadro_left_container">

        <!-- ++++++++++++++++++++++++++++++ MODULOS +++++++++++++++++++++++++++++++ -->
        <br>
        <h1 class="titulo_modulo">Seleccione una grafica</h1> <br><br>
        <div class="d-grid gap-2">
            <a class="btn btn-warning btn-lg" role="button" href="{{ route('reportes.invoke') }}"><i class="bi bi-archive-fill"></i>  Reporte de productos con menos stock</a>
            <br>
            <a class="btn btn-warning btn-lg" role="button" href="{{ route('reportes.productos_mas_vendidos') }}"><i class="bi bi-clipboard-data-fill"></i> Productos mas vendidos</a>
            <br>
            <a class="btn btn-warning btn-lg" role="button" href="{{ route('reportes.vendedores') }}"><i class="bi bi-bar-chart-line-fill"></i> Reporte vendedores</a>
            <br>
            <a class="btn btn-warning btn-lg" role="button" href="{{ route('administrador') }}"><i class="bi bi-arrow-left"></i> Volver al menú principal</a>
            <br>
        </div>
    </div>
    <div class="cuadro_right_container">
        <!-- ++++++++++++++++++++++++++++++ GRAFICAS +++++++++++++++++++++++++++++++ -->
        <h1 class="titulo_modulo_black_1">GRAFICAS</h1> <br>

        <div>
            <canvas id="myChart"></canvas>
        </div>
              
        
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        const ctx = document.getElementById('myChart');
        var productos = @json($productos);
        var nombre_productos = [];
        var grafica = @json($grafica);
        var cantidad = [];

        

        console.log(productos);
        console.log(grafica);

        if (grafica == 'productos_bajo_stock'){
            for (var i = 0; i < productos.length; i++) {
                nombre_productos.push(productos[i].nombre_producto);
                cantidad.push(productos[i].cantidad_disponible_t);
            }
            var label_grafica = '# de productos disponibles en tienda';
        }
        else if (grafica == 'productos_mas_vendidos'){
            for (var i = 0; i < productos.length; i++) {
                nombre_productos.push(productos[i].nombre_producto);
                cantidad.push(productos[i].cantidad_repeticiones);
            }
            var label_grafica = '# de ventas por producto';
        }
        else if (grafica == 'vendedores'){
            for (var i = 0; i < productos.length; i++) {
                nombre_productos.push(productos[i].nombre_usuario);
                cantidad.push(productos[i].cantidad_repeticiones);      
            }
            var label_grafica = '# de ventas por vendedor';
        }
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: nombre_productos,
            datasets: [{
                label: label_grafica,
                data: cantidad,
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        }); 
    </script>

@endsection
