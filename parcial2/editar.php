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
    // Obtener el ID del registro a editar
    $id = $_POST["id"];

    // Obtener los datos actuales del registro
    $sqlSelect = "SELECT * FROM parcial2 WHERE id = $id";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();

        // Mostrar el formulario de edición
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Editar Registro</title>
            <link rel="stylesheet" type="text/css" href="css/estilos.css">
        </head>
        <body>
            <h1>Editar Registro</h1>
            <form action="guardar_edicion.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="n">N:</label>
                <input type="text" name="n" value="<?php echo $row['N']; ?>"><br>
                <label for="factorial">Factorial:</label>
                <input type="text" name="factorial" value="<?php echo $row['Factorial']; ?>"><br>
                <label for="sumatoria">Sumatoria:</label>
                <input type="text" name="sumatoria" value="<?php echo $row['UltimaSumatoria']; ?>"><br>
                <input type="submit" value="Guardar">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
