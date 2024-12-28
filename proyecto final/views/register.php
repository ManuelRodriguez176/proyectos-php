<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        $registerError = "Error al registrar el usuario: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro a Snakeman</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <form action="register.php" method="post">
        <h2>Registro</h2>
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input class="restart_game" type="submit" value="Registrarse">
        <button id="restart_game" type="button" onclick="exitGame()">Ir a login si ya tienes tu usuario</button><br>
        <!-- Muestra el mensaje de error debajo del botón de enviar con color rojo -->
        <?php if (isset($registerError) && !empty($registerError)) : ?>
            <div class="error-message"><?php echo $registerError; ?></div>
        <?php endif; ?>
    </form>
    <script src="js/script.js"></script>
</body>
</html>
