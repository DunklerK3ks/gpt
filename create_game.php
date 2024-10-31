<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_code = generateGameCode();
    $player_name = $_POST['player_name'];
    
    // In a real application, you would store this in a database
    $_SESSION['game'] = [
        'code' => $game_code,
        'creator' => $player_name,
        'joiner' => null,
        'current_question' => 0,
        'answers' => []
    ];
    
    header("Location: index.php?action=game");
    exit;
}
?>

<h2>Spiel erstellen</h2>
<form method="post">
    <input type="text" name="player_name" placeholder="Dein Name" required>
    <button type="submit" class="btn">Spiel erstellen</button>
</form>