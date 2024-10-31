<?php
$match_count = 0;
foreach ($_SESSION['game']['answers'] as $question_answers) {
    if (strtolower($question_answers[0]) === strtolower($question_answers[1])) {
        $match_count++;
    }
}

function getFeedback($match_count, $total_questions) {
    if ($match_count >= 8) return "Ihr seid ein super Team!";
    if ($match_count >= 5) return "Ihr kennt euch schon recht gut!";
    return "Da gibt es noch einiges zu entdecken!";
}
?>

<h2>Ergebnis</h2>
<p>Ihr habt <?php echo $match_count; ?> von <?php echo count($questions); ?> Antworten gleich!</p>
<p><strong><?php echo getFeedback($match_count, count($questions)); ?></strong></p>

<div>
    <?php foreach ($questions as $index => $question): ?>
        <div class="result-item">
            <p><strong><?php echo $question; ?></strong></p>
            <p><?php echo $_SESSION['game']['creator']; ?>: <?php echo $_SESSION['game']['answers'][$index][0]; ?></p>
            <p><?php echo $_SESSION['game']['joiner']; ?>: <?php echo $_SESSION['game']['answers'][$index][1]; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<a href="index.php" class="btn">Neues Spiel starten</a>