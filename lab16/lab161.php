<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 16.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
</head>
<body>
    <h1>Consulta de Servicio Web de Conversión de Temperatura</h1> 
    <form name="FormConv" method="post" action="lab161.php">
        <br/>
        Convertir desde 
        <select name="temp">
            <option value="CtoF" selected>°C a °F</option>
            <option value="FtoC">°F a °C</option>
        </select> el valor
        <input type="number" name="valor" step="Any" required>
        <input name="Convertir" value="Convertir" type="submit" />
    </form>
    
    <?php
    $servicio = "https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
    $parametros = array();

    if (array_key_exists('Convertir', $_POST)) {
        $valor = $_POST['valor'];
        $temp = $_POST['temp'];
        
        if ($temp == "CtoF") {
            $parametros['Celsius'] = $valor;
            $cliente = new SoapClient($servicio, $parametros);
            $resultObj = $cliente->CelsiusToFahrenheit($parametros);
            $resultado = $resultObj->CelsiusToFahrenheitResult;
        } else {
            $parametros['Fahrenheit'] = $valor;
            $cliente = new SoapClient($servicio, $parametros);
            $resultObj = $cliente->FahrenheitToCelsius($parametros);
            $resultado = $resultObj->FahrenheitToCelsiusResult;
        }
        print ("<br>La temperatura $valor $temp es igual a: $resultado " . substr($temp, 0, 1));
    } 
    ?>
</body>
</html>
