<?php
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Impresoras</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Listado de Impresoras - {{ Carbon::today()->format('d-m-Y') }}</h2>
    <table>
        <thead>
            <tr>
                <th>IP</th>
                <th>Modelo</th>
                <th>Ubicación</th>
                <th>Usuario</th>
                <th>Sede RCJA</th>
                <th>Organismo</th>
                <th>Contrato</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Páginas Total</th>
                <th>Páginas BW</th>
                <th>Páginas Color</th>
                <th>MAC</th>
                <th>Nº Serie</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impresoras as $impresora)
                <tr>
                    <td>{{ $impresora->ip }}</td>
                    <td>{{ $impresora->modelo }}</td>
                    <td>{{ $impresora->ubicacion }}</td>
                    <td>{{ $impresora->usuario }}</td>
                    <td>{{ $impresora->sede_rcja }}</td>
                    <td>{{ $impresora->organismo }}</td>
                    <td>{{ $impresora->contrato }}</td>
                    <td>{{ $impresora->tipo }}</td>
                    <td>{{ $impresora->color ? 'Sí' : 'No' }}</td>
                    <td>{{ $impresora->paginas_total }}</td>
                    <td>{{ $impresora->paginas_bw }}</td>
                    <td>{{ $impresora->paginas_color }}</td>
                    <td>{{ $impresora->mac }}</td>
                    <td>{{ $impresora->num_serie }}</td>
                    <td>{{ $impresora->activo ? 'En activo' : 'Desactivado'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>