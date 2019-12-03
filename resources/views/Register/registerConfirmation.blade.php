<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remextiven</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:400,600|Roboto:700&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .contenidoCaja{
            font-family: 'Montserrat', sans-serif;       
        }
        .caja{
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 25px;
            text-align: justify;
        }

    </style>

</head>
<body style="background-image: linear-gradient(to bottom right,#ffd959,#ff5d57); background-size: 100% 100%; background-attachment:fixed">

    
    <div class="caja" style="max-width: 700px; padding: 10px; margin:40px auto; border-collapse: collapse;">
        <img class="img-fluid" src="img/logoRemextivenDefinitivo.png" alt="Remextiven">
        <br/>
        <center><h2>¡Gracias Elegirnos!</h2></center>
        <br/>
        <div class="contenidoCaja" style="margin: 2% 10% 2%; text-align: justify;">
            <p>
                Ya formas parte de Remextiven. <br/>
                Sin embargo, aun falta que actives tu cuenta. <br/>
                Te hemos enviado un correo electronico con el enlace de activación el cual deberia llegarte en los proximos minutos.
            </p>
            <p>
                En caso de no encontrar el correo, verifica la casilla spam.       
            </p>    
            <br/>
            <center><a href="{{ route('inicio') }}" style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #02be69">Volver al incio</a></center>
        </div>
    </div>
</body>
</html>