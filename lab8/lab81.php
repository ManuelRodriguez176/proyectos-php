<?php

class Laboratorio81
{
    private $datos;

    public function __construct()
    {
        $this->datos = [12, 15, 20, 9, 11, 30, 50, 8, 15, 17, 90, 21, 45, 10, 19, 23, 18, 28, 27, 29];
    }

    public function compararArray()
    {
        $masalto = max($this->datos);
        $posicion = array_search(max($this->datos), $this->datos);
        echo "El número más alto es: " . $masalto . " y su posición es: " . $posicion;
    }

    public function mostrarFormulario()
    {
        ?>
        <form action="lab81.php" method="POST">
            Este es mi programa de arreglos:
            <br/> <br/>
            Mi arreglo: $datos = [12, 15, 20, 9, 11, 30, 50, 8, 15, 17, 90, 21, 45, 10, 19, 23, 18, 28, 27, 29];
            <br/> <br/>
            <input type="submit" name="comparacion" value="Comparación del array">
        </form>
        <?php
    }
}

// Uso de la clase
$laboratorio = new Laboratorio81();

if (array_key_exists('comparacion', $_POST)) {
    $laboratorio->compararArray();
} else {
    $laboratorio->mostrarFormulario();
}
?>
