<?php
session_start();
require_once 'db.php';

$error_message = ""; // Inicializa la variable de mensaje de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        die("Error en la consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: Snake.php");
        } else {
            $error_message = "Contraseña incorrecta";
        }
    } else {
        header("Location: register.php");
        $error_message = "Usuario no encontrado";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión a Snakeman</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>Iniciar sesión</h2>
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Iniciar sesión">

        <button id="restart_game" type="button" onclick="mostrarscore()">Puntajes más altos</button>
        <button id="restart_game" type="button" onclick="register()">Ir a registrarse</button>
        <!-- Muestra el mensaje de error debajo del formulario -->
        <?php if (!empty($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </form>
    <script src="js/script.js"></script>
</body>
</html>


