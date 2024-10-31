<?php
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : '';

$questions = [
    "Was ist deine Lieblingsfarbe?",
    "Welches Essen könntest du jeden Tag essen?",
    "Welcher Urlaubsort ist dein Traumziel?",
    "Was ist dein Lieblingsfilm?",
    "Welche Musikrichtung hörst du am liebsten?",
    "Was ist deine größte Angst?",
    "Welches Tier beschreibt dich am besten?",
    "Was war dein peinlichster Moment?",
    "Was war dein schönster Kindheitserinnerung?",
    "Welches Buch oder welche Serie magst du besonders?"
];

function generateGameCode() {
    return substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 5);
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dating-Spiel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #FFD1DC, #E0F0FF);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }
        h1, h2 {
            color: #FF69B4;
            text-align: center;
        }
        .btn {
            background-color: #FF69B4;
            color: white;
            border: none;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #FF1493;
        }
        input[type="text"] {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .progress-bar {
            background-color: #f0f0f0;
            border-radius: 5px;
            margin: 1rem 0;
        }
        .progress {
            background-color: #FF69B4;
            height: 10px;
            border-radius: 5px;
            transition: width 0.3s ease;
        }
        #game-code {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        switch ($action) {
            case 'create_game':
                include 'create_game.php';
                break;
            case 'join_game':
                include 'join_game.php';
                break;
            case 'game':
                include 'game.php';
                break;
            default:
                include 'home.php';
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function checkGameStatus() {
            $.get('check_game.php', function(data) {
                if (data.status === 'ready') {
                    window.location.href = 'index.php?action=game';
                }
            });
        }

        $(document).ready(function() {
            if ($('#waiting-room').length) {
                setInterval(checkGameStatus, 5000);
            }
        });
    </script>
</body>
</html>