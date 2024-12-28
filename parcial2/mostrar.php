<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Factoriales</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Tabla de Factoriales</h1>
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

    // Obtener datos de la base de datos
    $sql = "SELECT id, N, Factorial,UltimaSumatoria FROM parcial2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>N</th><th>Factorial</th><th>Sumatoria</th><th>Acciones</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['N']}</td>";
            echo "<td>{$row['Factorial']}</td>";
            echo "<td>{$row['UltimaSumatoria']}</td>";
            echo "<td><form action='editar.php' method='post'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'>";
            echo "<button class='edit-btn' type='submit'>Editar</button>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</table>";
         } else {
        echo "No hay datos en la tabla.";
        }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>

