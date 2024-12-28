<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_POST['score'])) {
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $score = $_POST['score'];

    $sqlInsert = "INSERT INTO scores (user_id, username, score) VALUES ('$userId', '$username', '$score')";

    if ($conn->query($sqlInsert) === TRUE) {
        // Éxito al guardar el puntaje
        echo "Puntaje guardado correctamente.";
    } else {
        // Error al guardar el puntaje
        echo "Error al guardar el puntaje: " . $conn->error;
    }
} else {
    // El usuario no está autenticado o faltan variables
    echo "Usuario no autenticado o faltan variables. No se pudo guardar el puntaje.";
}

$conn->close();
?>
