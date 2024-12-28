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

// Función para calcular el factorial
function factorial($n) {
    if ($n === 0 || $n === 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $N = $_POST["numero"];
    $Factorial = factorial($N);



    // Obtener la última sumatoria
    $sqlUltimaSumatoria = "SELECT UltimaSumatoria FROM parcial2 ORDER BY id DESC LIMIT 1";
    $resultUltimaSumatoria = $conn->query($sqlUltimaSumatoria);
    $ultimaSumatoria = $resultUltimaSumatoria->fetch_assoc()['UltimaSumatoria'];

    // Calcular la nueva sumatoria
    $nuevaSumatoria = $ultimaSumatoria + $Factorial;

    // Almacenar el nuevo resultado en la base de datos
    $sqlInsert = "INSERT INTO parcial2 (N, Factorial, UltimaSumatoria) VALUES ($N, $Factorial, $nuevaSumatoria)";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "El factorial de $N es $Factorial y se ha almacenado en la base de datos junto con la última sumatoria.";

        // Mostrar la última sumatoria
        echo "<p>Última sumatoria: $nuevaSumatoria</p>";
    } else {
        echo "Error al almacenar en la base de datos: " . $conn->error;
    }

    // Redirigir a mostrar.php después de realizar las operaciones
    header("Location: mostrar.php");
}

// Cerrar la conexión a la base de datos
$conn->close();
?>




