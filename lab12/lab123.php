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
    <h2>Paso 3 : la variable ya a sido destruida y su valor se ha perdido</h2>
    <?php
    if(isset($_SESSION['var'])){
        $var=$_SESSION['var'];
    }else{
        $var="";
    }
    print("<p>Valor de la variable de sesion: $var</p>\n");
    session_destroy();
?>
<a href="lab121.php">Paso 1</a>
</body>
</html>