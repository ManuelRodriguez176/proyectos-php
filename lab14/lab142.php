<?php
  session_start();  
?>
<?php
  session_start ();  
?>
<html lang="es">
<head>
    <title>Laboratorio 14.2</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<?php
    if(isset($_SESSION["usuario valido"])){
        print ("<P>[ <A href='login.php'>Menu principal</A>]</P>");
    }
    else{
        print ("<br><br>\n");
        print ("<p align='CENTER'>Acceso no autorizado</p>\n");
        print ("<p align='CENTER'>[<A href='login.php' target='_top'>Conectar</A>]</p>\n");
    }
?>
<?php
     require_once("class/noticias.php");

     $obj_noticia = new Noticia();
     $noticias = $obj_noticia->consultar_noticias();
     $nfilas=count($noticias);

     if($nfilas>0){
        print ("<TABLE>\n");
        print ("<TR>\n");
        print ("<TH>Titulo</TH>\n");
        print ("<TH>Texto</TH>\n");
        print ("<TH>Categoria</TH>\n");
        print ("<TH>Fecha</TH>\n");
        print ("<TH>Imagen</TH>\n");
        print ("</TR>\n");

        foreach ($noticias as $resultado){
            print ("<TR>\n");
            print("<TD>".$resultado['titulo']."</TD>\n");
            print("<TD>".$resultado['texto']."</TD>\n");
            print("<TD>".$resultado['categoria']."</TD>\n");
            print("<TD>".date("j/n/Y",strtotime($resultado['fecha']))."</TD>\n");

            if($resultado['imagen']!=""){
                print("<TD><A TARGET='_blank' HREF='img/".$resultado['imagen']."'>
                <IMG BORDER='0' SRC='img/icontexto.gif'></A></TD>\n");
            }else{
                print("<TD>&nbsp;</TD>\n");
            }
            print ("</TR>\n");
        }
        print ("</TABLE>\n");
     }else{
        print("No hay noticias disponibles");
     }

     
    ?>
</body>
</html> 