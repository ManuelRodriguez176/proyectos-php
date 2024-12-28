<?php
        if(array_key_exists('enviar',$_POST)){
            $expire=time()+60*5;
            setcookie("user",$_REQUEST['visitante'],$expire);
            header("Refresh:0");
        }
?>
<html lang="es">
<head>
    <title>Laboratorio 13</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>
    <h1>Creacion de Cookies</h1>
    <h2>La coockie "User" tendra solo 5 minutos de duracion</h2>
    <?php
        if(isset($_COOKIE["user"])){
            print("<br/>Hola<b>".$_COOKIE['user']."</b> gracias por su visita a nuestro sitio web</br>");
        }else{
            ?>
         <form name="formcookie" action="lab=134.php" method="post">
            <br/>Hola, primera vez que te vemos por nuestro sitio web ¿Cómo te llamas?
            <input type="text" name="visitante">
            <input name="enviar" value="Gracias por identificarse" type="submit"/><br/>
            <?php
        }
        ?>
        <br/><a href="lab133.php">Continuar...</a>
</body>
</html>