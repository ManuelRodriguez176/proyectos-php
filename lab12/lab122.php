<?php

    session_start ();
?>
<html lang="es">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Laboratorio 12</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>Manejo de sesiones</h1>
    <h2>Paso 2 : se accede a  la variable de sesion almacenda y se destruye</h2>
    <?php
    if(isset($_SESSION['var'])){
        $var=$_SESSION['var'];
        print("<p>Valor de la variable de sesion: $var</p>\n");
        unset($_SESSION['var']);
          print("<A HREF='lab123.php'>Paso 3</A>");
    }else{
        print("Sesion no iniciada, ir al <A HREF='lab121.php'>Paso 1</A> para iniciar la sesion");
    }
?>
</body>
</html>