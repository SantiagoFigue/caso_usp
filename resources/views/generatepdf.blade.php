<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reporte de productos</title>
    <style type="text/css">
        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            margin: 3px !important;
            height: 100%;
            
        }
        p{
            font-size: 1em
        }
        label {
            display: block;
            text-align: center;
            padding-bottom: 50px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 3.5px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Reporte de productos</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Unidad de Medida</th>
            <th scope="col">Impuesto</th>
            <th scope="col">Costo</th>
            <th scope="col">Existencia</th>
            </tr>
        </thead>
        <tbody>
            @if(count($products) == 0)
                <tr>
                    <td colspan="7"><p style="text-align: center;">No hay datos registrados</p></td>
                </tr>
            @else
                @foreach ($products as $product)
                <tr>
                    <td><p>{{$product->id}}</p></td>
                    <td><p>{{$product->name}}</p></td>
                    <td><p>{{$product->description}}</p></td>
                    <td><p>{{$product->unit_measurement}}</p></td>
                    <td><p>$ {{$product->tax}}</p></td>
                    <td><p>$ {{$product->cost}}</p></td>
                    <td><p>{{$product->existence}}</p></td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>