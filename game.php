<?php
if (!isset($_SESSION['game'])) {
    header("Location: index.php");
    exit;
}

$game = $_SESSION['game'];
$is_creator = isset($_SESSION['game']['creator']);

if ($game['joiner'] === null) {
    // Waiting for second player
    ?>
    <h2>Warte auf zweiten Spieler</h2>
    <p>Teile diesen Code mit deinem Mitspieler:</p>
    <div id="game-code"><?php echo $game['code']; ?></div>
    <div id="waiting-room">Warten auf Mitspieler...</div>
    <?php
} else {
    // Game is ready to play
    $current_question = $game['current_question'];
    $total_questions = count($questions);
    $progress = ($current_question + 1) / $total_questions * 100;
    
    if ($current_question >= $total_questions) {
        // Game is finished
        include 'result.php';
    } else {
        // Display current question
        ?>
        <h2>Frage <?php echo $current_question + 1; ?> von <?php echo $total_questions; ?></h2>
        <div class="progress-bar">
            <div class="progress" style="width: <?php echo $progress; ?>%"></div>
        </div>
        <p><?php echo $questions[$current_question]; ?></p>
        <form method="post" action="submit_answer.php">
            <input type="text" name="answer" placeholder="Deine Antwort" required>
            <button type="submit" class="btn">Antwort abschicken</button>
        </form>
        <?php
    }
}
?>