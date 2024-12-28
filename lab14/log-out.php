<?php
  session_start();  
?>
<head>
    <title>Desconectar</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <?php
    if(isset($_SESSION["usuario_valido"])){
        session_destroy();
        print ("<br><br><p align='CENTER'>Conexion finalizada</p>\n");
        print ("<p align='CENTER'>[<A href='login.php'>Conectar</A>]</p>\n");
    }
    else{
        print ("<br><br>\n");
        print ("<p align='CENTER'>No exite una conexion activa</p>\n");
        print ("<p align='CENTER'>[<A href='login.php'>Conectar</A>]</p>\n");
    }
    ?>
</body>