<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 10.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <?php
    require_once("class/votos.php");
    if(array_key_exists('enviar',$_POST))
    {
        print ("<h1>Encuesta. Voto registrado</h1>\n");

        $obj_votos=new votos();
        $result_votos= $obj_votos->listar_votos();

        foreach($result_votos as $result_votos){
            $votos1=$result_voto['votos1'];
            $votos2=$result_voto['votos2'];
        }

        $voto = $_REQUEST['voto'];
            if($voto=="si")
                $votos1 = $votos1 +1;
            else if($voto=="no")
                $votos2 = $votos2 +1;
            $obj_votos= new votos();
            $result = $obj_votos->actualizar_votos($votos1,$votos2);

            if($result){
                print("<p> Su voto a sido registrado. Gracias por participar</p>\n");
                print("<a href='lab102.php'>ver resultados</a>\n");
            }
            else{
                print("<a href='lab101.php'> Error al actualizar su voto</a>\n");
            }
    }
    else{
    ?>
    <h1>Encuesta</h1>
    <p>¿Cree usted que el precio de las viviendas seguira viendo un aumento al ritmo actual?</p>
    <form method="post" action="lab101.php">
        <input type="radio" name="voto" value="si" checked>Si<br>
        <input type="radio" name="voto" value="no" checked>No<br><br>
        <input type="Submit" name="enviar" value="votar">
    </form>
    <a href="lab102.php">Ver resultados</a>
    <?php
    }
    ?>
</body>
</html>