<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado Transferir N° 1</title>

    <style>
        .tablaListado{
            width: 700px;
            border-collapse: collapse; 
            text-align: center;
        }

        .tablaListado td, .tablaListado th{
        border: 1px solid #ddd;
        }

        .tablaListado th{
           
        }

        .tablaListado :nth-child(odd) {
            
            background-color:#f2f2f2;
            
        }
            
        tr:nth-child(even) {
            
            background-color:#fbfbfb;
            
        }

        
    </style>
</head>
<body>
    <!--HEADER-->
    <h1>{{$tran->IdUsuarioSolicita ?? 'text' }}</h1>
<table style="margin-bottom: 10px; width:100%;">
    <tr>
        <td><img src="img/images/pdf/logoPDF1.png" style="width:290px;" alt=""></td>
        <td>
            <h2 style="margin-bottom: 0; text-align:right;">Listado de transferencia</h2>
            <h2 style="margin-top:0; text-align:right;">N° 1</h2>
        </td>
    </tr>
</table>
<br/>
<br/>
<br/>

<table class="tablaListado">
    <tr>
        <th style="width:60px;">
            N°
        </th>
        <th style="width:210px;">
            Cuenta
        </th>
        <th style="width:260px;">
            Banco
        </th>
        <th style="width:140px;">
            Monto
        </th>
        <th style="width:30px;">
            ok
        </th>
    </tr>
    @for ($i = 0; $i < 50; $i++)
    <tr>
        <td>
            234832
        </td>

        <td>
            AHORRO
            <br/>
            2938283938493849384938
        </td>

        <td>
            Banco de las Americas hispanas SA
        </td>

        <td>
            200.000.000 VES
        </td>

        <td>
            OK
        </td>
    </tr>
    @endfor


    <footer>
        <table>
            
        </table>
    </footer>
</table>
</body>
</html>