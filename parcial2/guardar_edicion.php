<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labsdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $n = $_POST["n"];
    $factorial = $_POST["factorial"];
    $sumatoria = $_POST["sumatoria"];

    // Actualizar el registro en la base de datos
    $sqlUpdate = "UPDATE parcial2 SET N = $n, Factorial = $factorial, UltimaSumatoria = $sumatoria WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
} else {
    echo "Datos no proporcionados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
