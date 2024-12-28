<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Laboratorio 2.6</title>
        </head>
        <body>
            <?php
            $persona=array(
                array("Nombre" => "Rosa","Estatura" => 168,"Sexo"=>"F"),
                array("Nombre" => "Ignacio","Estatura" => 175,"Sexo"=>"M"),
                array("Nombre" => "Daniel","Estatura" => 172,"Sexo"=>"M"),
                array("Nombre" => "Rubén","Estatura" => 182,"Sexo"=>"M"),
            );
            echo "<b>DATOS SOBRE EL PERSONAL<b><br><hr>";

            $numPersonas = count($persona);

            for($i=0; $i < $numPersonas;$i++){
                echo "Nombre:  <br>",$persona[$i]['Nombre'],"</br><br>";
                echo "Estatura:  <br>",$persona[$i]['Estatura']," cm</br><br>";
                echo "Sexo:  <br>",$persona[$i]['Sexo'],"</br><br><hr>";
            }
            ?>
        </body> 
</html>