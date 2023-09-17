<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/storage/img/favicon.ico') }}">
    <title>Cash Inventory | Imprimir</title>
    <style>
        table {
            width: 100%;
            border: 1px solid #000;
        }
        th, td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
        }
        caption {
            padding: 0.3em;
            color: #fff;
            background: #000;
        }
        th {
            background: #eee;
        }


    </style>
</head>

<body>
    <center>
        <h1>FACTURA</h1>
        <h3>Remate el Aguila</h3>
        <h3>Cash Inventory</h3>
        <br>
       
        <br><br>
    
        <table class="table table-light table-striped">
            <thead>
                <tr>
                    <th class="table-dark"scope="col">Codigo de barras</th>
                    <th class="table-dark"scope="col">Nombre</th>
                    <th class="table-dark"scope="col">Precio Unitario</th>
                    <th class="table-dark"scope="col">Cantidad</th>
                    <th class="table-dark"scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalle_facturas as $detalle_factura)
                    <tr class="table-light">
                        <td class="table-light">{{ $detalle_factura->codigo_barras }}</td>
                        <td class="table-light">{{ $detalle_factura->nombre_producto }}</td>
                        <td class="table-light text-end">${{ $detalle_factura->precio_unitario }}</td>
                        <td class="table-light">{{ $detalle_factura->cantidad_producto_factura }}</td>
                        <td class="table-light text-end">${{ $detalle_factura->total }}</td>
                    </tr>              
                @endforeach
            </tbody>
        </table>

        <br><br>

        <table class="table table-light table-striped scroll">
            <tbody>
                <tr>
                    <td class="table-dark"scope="col">Valor parcial: </td>
                    <td class="table-light text-end">${{ $parcial_factura }}</td>
                </tr>
                <tr>
                    <td class="table-dark"scope="col">IVA 19%: </td>
                    <td class="table-light text-end">${{ $iva }}</td>
                </tr>
                <tr>
                    <td class="table-dark"scope="col">Total: </td>
                    <td class="table-light text-end">${{ $total_factura }}</td>
                </tr>
            </tbody>
        </table>
        <br><br>

        <div>
            <p>Nit. 830814323<p>
            <p>Cra 88c #52b -37 Bosa Brasil</p>
            <p>Bogotá, Colombia</p>
            <p>Resolución Dian: 124894165319841</p>
            <p>Tel: 3118654242 - 7451620</p>
        </div>
       
    </center>
</body>
</html>

    

