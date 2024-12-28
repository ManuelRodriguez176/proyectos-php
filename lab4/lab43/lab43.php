<html>
    <head>
        <title>Laboratorio 4.3</title>
    </head>
    <body>
        <?php
        if(array_key_exists('comparacion', $_POST)){
            $datos = [12, 15, 20, 9, 11, 30, 50, 8, 15, 17, 90, 21, 45, 10, 19, 23, 18, 28, 27,29];
            $masalto = max($datos);
            $posicion = array_search(max($datos),$datos);
            echo "El numero más alto es: ".$masalto." y su posicion es: ".$posicion;  
        }
        else{
           ?>
           <form action= "lab43.php" method = "POST">
            Este es mi programa de arreglos:
            <br/> <br/>
            Mi arrego: $datos = [12, 15, 20, 9, 11, 30, 50, 8, 15, 17, 90, 21, 45, 10, 19, 23, 18, 28, 27,29];
            <br/> <br/> 
            <input type="submit" name="comparacion" value="Comparacion del array">
            <form>
           <?php
        }
        ?>
    </body>
</html>