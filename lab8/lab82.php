<?php

class FormularioCajas
{
    private $numeroCajas;

    public function __construct()
    {
        $this->numeroCajas = isset($_GET['cajas']) ? $_GET['cajas'] : null;
    }

    public function mostrarFormulario()
    {
        if (!$this->numeroCajas) {
            echo $this->generarFormularioCajas();
        } else {
            echo $this->generarFormularioDatos();
        }
    }

    private function generarFormularioCajas()
    {
        return '
            <form>
                <input name="cajas"/> Número de cajas (tamaño del array)
                <button>Enviar</button>
            </form>
        ';
    }

    private function generarFormularioDatos()
    {
        $txt = '<form action="?cajas=' . $this->numeroCajas . '" method="post">';
        for ($i = 0; $i < $this->numeroCajas; $i++) {
            $txt .= '<div>';
            $txt .= '<input name="caja[]"';
            if (
                isset($_POST['caja'][$i])
                and is_numeric($_POST['caja'][$i])
                and $_POST['caja'][$i] % 2 == 0
            ) {
                $txt .= ' value="' . $_POST['caja'][$i] . '"';
            }
            $txt .= '/>';
            $txt .= '</div>';
        }
        $txt .= '<button>Enviar</button>';
        $txt .= '</form>';

        return $txt;
    }
}

// Uso de la clase
$formulario = new FormularioCajas();
$formulario->mostrarFormulario();
?>
