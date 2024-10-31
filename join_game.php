<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_code = $_POST['game_code'];
    $player_name = $_POST['player_name'];
    
    // In a real application, you would check the database for the game code
    if (isset($_SESSION['game']) && $_SESSION['game']['code'] === $game_code) {
        $_SESSION['game']['joiner'] = $player_name;
        header("Location: index.php?action=game");
        exit;
    } else {
        $error = "Ungültiger Spielcode. Bitte versuche es erneut.";
    }
}
?>

<h2>Spiel beitreten</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
<form method="post">
    <input type="text" name="game_code" placeholder="Spielcode" required>
    <input type="text" name="player_name" placeholder="Dein Name" required>
    <button type="submit" class="btn">Spiel beitreten</button>
</form>