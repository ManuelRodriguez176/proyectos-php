<?php
// Conexión a la base de datos
require_once 'db.php';

// Llamada al procedimiento almacenado
$sql = "CALL GetScores()";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Puntuaciones</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            echo "<h2>Tabla de Puntuaciones</h2>";
            echo "<table border='1'>
                <tr>
                    <th>Nombre de Usuario</th>
                    <th>Puntaje</th>
                    <th>Fecha y Hora</th>
                </tr>";

            // Mostrar datos de la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['username'] . "</td>
                        <td>" . $row['score'] . "</td>
                        <td>" . $row['timestamp'] . "</td>
                    </tr>";
            }

            echo "</table>";

            // Botón para regresar al juego
            echo "<form action='login.php' method='post'>";
            echo "<input id='restart_game' type='submit' value='Registrarse'>";
            echo "</form>";
        } else {
            echo "No hay puntuaciones disponibles.";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>
</body>

</html>