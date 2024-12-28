<html>
    <head>
        <title>Laboratorio 4.1</title>
    </head>
    <body>
        <?php
        
        if(array_key_exists('enviar', $_POST)){
            if($_REQUEST['ventas'] > 70)
            {
                echo '<img src="http://localhost:3000/Labs/lab4/lab41/images/good.jpg" alt="" class="good" id="good" width="500px" height="500px">';
                echo "<br/>";
            }
            else if($_REQUEST['ventas'] > 49)
            {
                echo '<img src="http://localhost:3000/Labs/lab4/lab41/images/medium.jpg" alt="" class="medium" id="medium" width="500px" height="500px">';
                echo "<br/>";
            }
            else if($_REQUEST['ventas'] >-1)
            {
                echo '<img src="http://localhost:3000/Labs/lab4/lab41/images/bad.jpg" alt="" class="bad" id="bad" width="500px" height="500px">';
            }
            else{
                echo "Favor colocar al % de ventas";
            }
            echo "<br/>";
        }
        else{
           ?>
           <form action= "lab41.php" method = "POST">
            % de Ventas: <input type= "text"  name= "ventas"><br>
            <input type="submit" name="enviar" value="Enviar datos">
            <form>
           <?php
        }
        ?>
    </body>
</html>