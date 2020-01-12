<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$transferencia->IdSolicitudTransferencia}}</title>
    
    <style>

    .tablaConBordes{
        border-collapse: collapse;
    }

    .tablaConBordes th{
        text-align: center;
    }


    .tablaConBordes td, .tablaConBordes th{
        border: 1px solid #ddd;
    }
    


    #cotizacion{
        border-collapse: collapse;
    }
    #cotizacion td, #cotizacion th {
        border: 1px solid #ddd;
        padding: 8px;
    }   

    #cotizacion th {
        padding-left: 50px;
        padding-right: 50px;
    }

    #cotizacion .titulos, #detalle th{background-color: #f2f2f2;}


    #detalle{
        border-collapse: collapse;
    }
    
    #detalle th{
        border: 1px solid #ddd;
        padding: 8px;
        height: 15px;
        }

    #detalle td{
        border: 1px solid #ddd;
        padding: 8px;
        height: 25px;
    }
    .detalle{
        width:80%;
    }

    .costo{
        text-align: center;
    }

        .contenedor {
            width: 100%;
        }

        .textoIzquierda{
            text-align: left;
        }

        .textoDerecha{
            text-align: right;
        }

        .textoCentrado{
            text-align: center;
        }

        .letraPequeña{
            font-size: 10px;
        }

        .negrita{
            font-weight: bold;
        }

        .texto10{
            font-size: 10px;
        }

        .texto11{
            font-size: 11px;
        }

        .texto12{
            font-size: 12px;
        }

        .texto13{
            font-size: 13px;
        }

        .texto14{
            font-size: 14px;
        }

        .texto15{
            font-size: 15px;
        }

        .pieDePagina{
            position: absolute;
            bottom: 0;

        }

        .textoSinMyP{
            margin:4px;
            padding:0;
        }
        

    </style>
</head>
<body>

<!--HEADER-->
<table class="contenedor" style="margin-bottom: 10px;">
    <tr>
        <td><img src="img/images/pdf/logoPDF1.png" style="width:290px;" alt=""></td>
        <td class="textoDerecha"><img src="img/images/pdf/statusPendiente.png" style="width:250px;" alt=""></td>
    </tr>
    <tr>
        <td></td>
        <td class="textoDerecha">
            <p style="font-size: 10px; margin-top: -5px;">*Este documento NO posee valor legal siendo meramente informativo</p>
        </td>
    </tr>
</table>

<br/>
<br/>
<br/>


<table class="contenedor">
    <tr style="border: 1px solid red;">
        <td class="textoIzquierda">
            <table class="tablaConBordes" style="width: 300px;">
                <tr>
                    <th style="background-color: #f2f2f2;" colspan="2"><p class="texto13" style="margin:0; padding:0;">Cliente</p></th>
                </tr>

                <tr>
                    <td style="width:24%;">
                        <p class="texto12 negrita textoSinMyP"><span style="font-weight: bold">Nombre </span></p>
                    </td>
                    <td>
                        <p class="texto12 textoSinMyP">{{$transferencia->UsuarioTransferencia->DatosPersona->Nombre . ' ' . $transferencia->UsuarioTransferencia->DatosPersona->PrimerApellido . ' ' . $transferencia->UsuarioTransferencia->DatosPersona->SegundoApellido}}</p>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <p class="texto12 negrita textoSinMyP">CI / RUT </p>
                    </td>
                    <td>
                        <p class="texto12 textoSinMyP">{{$transferencia->UsuarioTransferencia->DatosPersona->Documento}}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="texto12 negrita textoSinMyP">Email</p>
                    </td>
                    <td>
                    <p class="texto12 textoSinMyP">{{$transferencia->UsuarioTransferencia->Email}}</p>
                    </td>                
                </tr>
            </table>           
        </td>
        
        <td style="width:230px;justify-content:right; padding-top: 2px;">         
            <div style="width:43%; float:right; text-align:center;">
                <p class="texto11" style="border: 1px solid #ddd; margin:0; padding:1px; background-color: #f2f2f2;">N° de Transferencia</p>
            <p style="border: 1px solid #ddd; margin-top:-1px; text-align:center;">{{$transferencia->IdSolicitudTransferencia}}</p>
            </div>
            <br/>
            <br/>
            <br/>
                <div style="width:43%; float:right; text-align:center;">
                    <p class="texto11" style="border: 1px solid #ddd; margin:0; background-color: #f2f2f2;">Fecha Vencimiento</p>
                <p style="border: 1px solid #ddd; margin-top:-1px; text-align:center;">{{date_format($transferencia->FechaSolicitada,"d/m/Y")}}</p>
                </div>
                <div style="width:10%; float:right;">

                </div>
                <div style="width:43%; float:right; text-align:center;">
                    <p class="texto11" style="border: 1px solid #ddd; margin:0; background-color: #f2f2f2;">Fecha Realizada</p>
                <p style="border: 1px solid #ddd; margin-top:-1px; text-align:center;">{{date_format($transferencia->FechaSolicitada,"d/m/Y")}}</p>
                </div>
                

        </td>
    </tr>
</table>

<br/>
<br/>
<br/>
<br/>


<table id="detalle" style="margin: 0 auto; width:100%;">
    <tr>
        <th class="textoCentrado">Detalle</th>
        <th class="textoCentrado">Costo</th>
    </tr>
    <tr>
        <td class="detalle">Envio de {{$cotizacionTransferencia->MontoEnviar . ' ' . $cotizacionTransferencia->Moneda->CodigoTexto}}</td>
        <td class="costo">{{$cotizacionTransferencia->Moneda->CodigoValor . ' ' . $cotizacionTransferencia->MontoEnviar}}</td>
    </tr>
    <tr>
        <td>Transferencia mediante abitab</td>
        <td class="costo">$ 69</td>
    </tr>
    <tr>
        <td></td>
        <td class="costo"></td>
    </tr>
    <tr>
        <td class="negrita" style="text-align:right; border: none !important;">Total</td>
        <td class="costo">{{$cotizacionTransferencia->MontoEnviar}}</td>
    </tr>
</table>


<br/>
<br/>
<br/>




<table style="width:100%;">
    <tr style="width:100%;">
        <td style="width:40%;">
            <table style="width: 50% !important;" class="textoCentrado" id="cotizacion">
                <tr>
                    <th colspan="2" class="titulos">Cotización</th>
                </tr>
                <tr>
                    <td>VES</td>
                    <td>USD</td>
                </tr>
                <tr>
                    <td>{{$cotizacionTransferencia->CotizacionVES ?? 'EN ESPERA'}}</td>
                    <td>{{$cotizacionTransferencia->Cambio ?? 'EN ESPERA'}}</td>
                </tr>
            </table>
        </td>
        
        <td>
            <table style="width: 100%; margin-left: 4px;" class="textoCentrado" id="cotizacion">
                <tr>
                    <th colspan="2" class="titulos">Beneficiario</th>
                </tr>
                <tr>
                    <td style="width:75px;">Nombre</td>
                    <td>{{$transferencia->CuentaBeneficiaria->Nombre . ' ' . $transferencia->CuentaBeneficiaria->Apellido }}</td>
                </tr>
                <tr>
                    <td>Banco</td>
                    <td>{{$transferencia->CuentaBeneficiaria->Banco->Banco}}</td>
                </tr>
            </table>      
       
        </td>
    </tr>
</table>



<footer class="pieDePagina" style="width:100%; text-align:right;">
    <img src="img/images/pdf/pieDePagina.png" style="width:290px;" alt="">
</footer>


{{-- <div style="float:left; border: 1px solid black; padding: 0;">
    <img src="img/LogoFondoTransparente.png" style="width:250px; padding-left: -5px;" alt="">
    <p style="margin-bottom:-17px; margin-top: -9px;">www.remxtiven.com</p>
    <p>remesas@remextiven.com</p>   
    
</div>
<div style="float:right; border: 1px solid black; padding: 0;">
    <h1>PENDIENTE DE PAGO</h1>
    <p style="margin-bottom: -17px; margin-top: -10px;">No olvide notificar su pago</p>
    <p>Este documento NO posee valor legal siendo meramente informativo</p>
</div>

<br/>
<br/>

<div style="width: 100%; border: 1px solid red; margin-top: 100px;">
    <div style="width: 50%; display:inline-block;">
        <p><span style="font-weight: bold">Cliente: </span> Juancho Paredez Soza</p>
        <p><span style="font-weight: bold">CI/RUT: </span> 5129451-9</p>
        <p><span style="font-weight: bold">Email: </span> jparedez@hotmail.com</p>          
    </div>
    <div style="width: 50%; display:inline-block; text-align:right;">
        <p><span style="font-weight: bold">Transferencia N°: </span> 294</p>
        <p><span style="font-weight: bold">Fecha: </span> 03/01/2020</p>
        <p><span style="font-weight: bold">Vencimiento: </span> 06/01/2020</p>   
    </div>
</div> --}}
    
</body>
</html>