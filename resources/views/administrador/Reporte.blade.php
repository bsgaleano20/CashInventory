@extends('layouts/layout')

@section('title', "Cash Inventory | Reportes")

@section('content')

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
            <a class="btn btn-warning btn-lg" role="button"><i class="bi bi-bar-chart-line-fill"></i> Reporte vendedores</a>
            <br>
            <a class="btn btn-warning btn-lg" role="button"><i class="bi bi-people-fill"></i> Reporte de usuarios</a>
        </div>
    </div>
    <div class="cuadro_right_container">
        <!-- ++++++++++++++++++++++++++++++ HISTORIAL +++++++++++++++++++++++++++++++ -->
        <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
              
        
    </div> 
		
    <script>
        {!! $chart1->renderChartJsLibrary() !!}
        {!! $chart1->renderJs() !!}
    </script>
@endsection
