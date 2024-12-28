<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="/css2/style.css">

    <title>Snake Game</title>
</head>

<body>
    <div class="container">
        <div class="instructions"> Usa las flechas de direcciones, empieza tocando cualquiera de ellas.
        </div>
        <div class="game">
        </div>
        <div class="game_controls">
            <div class="score_container">
                Puntaje: <span class="score">0</span>
            </div>
            <button id="restart_game" type="button" onclick="restartGame()">Comienza de nuevo</button>
            <button id="restart_game" type="button" onclick="exitGame()">Salir del juego</button>
            <button id="restart_game" type="button" onclick="mostrarpuntaje()">Puntajes más altos</button>
            <button id="restart_game" type="button" onclick="endGame()">Añadir Puntaje</button>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>

