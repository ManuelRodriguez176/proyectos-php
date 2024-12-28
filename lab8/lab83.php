<?php

class TablaLaboratorio
{
    private $tamano = 12;

    public function mostrarTabla()
    {
        echo "<table border=1>";
        for ($n1 = 1; $n1 <= $this->tamano; $n1++) {
            echo "<tr>";
            for ($n2 = 1; $n2 <= $this->tamano; $n2++) {
                $n = ((pow($n1, 1)) - $n2) + 1;
                echo "<td>", ($n == 1) ? $n : 0, "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

// Uso de la clase
$tablaLaboratorio = new TablaLaboratorio();
?>

<html>
<head>
    <title>Laboratorio 4.5</title>
</head>
<body>
    <?php
    $tablaLaboratorio->mostrarTabla();
    ?>
</body>
</html>
