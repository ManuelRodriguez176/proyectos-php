<?php
    if(isset($_COOKIE['contador'])){
        setcookie('contador',$_COOKIE['contador']+1, time() +365*24*60*60);
        $mensaje = 'Gracias por visitarnos. Numero de visitas: '.$_COOKIE['contador'];
    }else{
        //caduca en un año
        setcookie('contador',1,time() + 365 * 24 * 60* 60);
        $mensaje='Bienvenidos a nuestro sitio web';
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xlm:lang="es" lang:"es">
<head>
    <title>Laboratorio 13</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>Contador de visitas con Cookies</h1><p>
    <h3><?php echo $mensaje;?></h3>
    </p>
</body>
</html>