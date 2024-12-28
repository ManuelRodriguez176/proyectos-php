<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Formulario PHP</title>
</head>
<body>

<?php
// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $repetirContrasena = $_POST["repetirContrasena"];

    // Obtener la IP actual del equipo
    $ip = $_SERVER["REMOTE_ADDR"];

    // Validar y procesar los datos según tus necesidades
    // (Agregar aquí la lógica de validación y almacenamiento en la base de datos)

    // Aquí solo mostraremos los datos por fines de demostración
    echo "<h2>Datos del formulario:</h2>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellido: $apellido</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Contraseña: $contrasena</p>";
    echo "<p>Repetir Contraseña: $repetirContrasena</p>";
    echo "<p>IP del equipo: $ip</p>";
}
?>

<h2>Formulario de Registro</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" required><br>

    <label for="repetirContrasena">Repetir Contraseña:</label>
    <input type="password" name="repetirContrasena" required><br>

    <input type="submit" value="Enviar">
</form>

<!-- Agregar un botón adicional para registrar al usuario -->
<form method="post" action="registro_usuario.php">
    <input type="submit" value="Registrar Usuario">
</form>
<script>
    // Función para mostrar la alerta
    function mostrarAlerta() {
        alert("Usuario registrado correctamente. ¡Bienvenido!");
    }

    function verificar_email($email) {
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        return true;
    }
    return false;

    function verificar_password_strength($password) {
    if (preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        alert("Su contraseña es segura.");
    } else {
        alert("Su contraseña no es segura.");
    }
    }
    function verificar_ip($ip) {
    return preg_match("/^(25[0-5]|2[0-4][0-9]|[1-9]?[0-9])\.((25[0-5]|2[0-4][0-9]|[1-9]?[0-9])\.){2}(25[0-5]|2[0-4][0-9]|[1-9]?[0-9])$/", $ip);
    }

}

</script>

</body>
</html>
