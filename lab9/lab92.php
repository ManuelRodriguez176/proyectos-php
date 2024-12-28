<html lang="es">
<head>
    <title>Laboratorio 9.2</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<form name="FORMFILTRO" method="post" action=lab92.php>
    <br/>
    Filtrar por: <select name="campos">
        <option value="texto" select>Descripcion
        <option value="titulo" select>Titulo
        <option value="categoria" select>Categoria
    </select>
    con el valor
    <input type="text" name="valor">
    <input  name="Consultar Filtro" value="Filtrar Datos" type="submit">
    <input  name="Consultar Todos" value="Ver todos" type="submit">
</form>

<?php
     require_once("class/noticias.php");

     $obj_noticia = new Noticia();
     $noticias = $obj_noticia->consultar_noticias();

     if(array_key_exists('ConsultarTodo',$_POST)){
        $obj_noticia = new Noticia();
        $noticias = $obj_noticia->consultar_noticias();
     }
     if(array_key_exists('ConsultarFiltro',$_POST)){
        $obj_noticia = new Noticia();
        $noticias = $obj_noticia->consultar_noticias_filtro($_REQUEST['campos'],$_REQUEST['valor']);
     }


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