
<?php
  session_start();  
?>
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

class Paginador
{
    private $obj_noticia;
    private $noticias;
    private $noticiasPorPagina;

    public function __construct()
    {
        $this->obj_noticia = new Noticia();
        $this->noticiasPorPagina = 1; // Puedes ajustar la cantidad de noticias por página según tu preferencia
    }

    public function mostrarPagina($pagina)
    {
        $this->noticias = $this->obj_noticia->consultar_noticias();

        $nfilas = count($this->noticias);
        $paginasTotales = ceil($nfilas / $this->noticiasPorPagina);

        if ($nfilas > 0) {
            $noticiasPagina = array_chunk($this->noticias, $this->noticiasPorPagina);
            $pagina = max(min($pagina, $paginasTotales), 1);

            print("<TABLE>\n");
            print("<TR>\n");
            print("<TH>Titulo</TH>\n");
            print("<TH>Texto</TH>\n");
            print("<TH>Categoria</TH>\n");
            print("<TH>Fecha</TH>\n");
            print("<TH>Imagen</TH>\n");
            print("</TR>\n");

            foreach ($noticiasPagina[$pagina - 1] as $resultado) {
                print("<TR>\n");
                print("<TD>" . $resultado['titulo'] . "</TD>\n");
                print("<TD>" . $resultado['texto'] . "</TD>\n");
                print("<TD>" . $resultado['categoria'] . "</TD>\n");
                print("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</TD>\n");

                if ($resultado['imagen'] != "") {
                    print("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] . "'>
                    <IMG BORDER='0' SRC='img/icontexto.gif'></A></TD>\n");
                } else {
                    print("<TD>&nbsp;</TD>\n");
                }
                print("</TR>\n");
            }
            print("</TABLE>\n");

            // Agregar estilos CSS a la paginación
            echo "<div class='pagination'>";
            for ($i = 1; $i <= $paginasTotales; $i++) {
                echo "<a class='page-link' href='?pagina=$i'>$i</a> ";
            }
            echo "</div>";
        } else {
            print("No hay noticias disponibles");
        }
    }
}

// Uso del paginador
$paginador = new Paginador();
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
?>

<html lang="es">

<head>
    <title>Laboratorio 143</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <?php
    $paginador->mostrarPagina($pagina);
    ?>
</body>

</html>
