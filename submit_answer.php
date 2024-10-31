<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['game'])) {
    $answer = $_POST['answer'];
    $current_question = $_SESSION['game']['current_question'];
    
    if (!isset($_SESSION['game']['answers'][$current_question])) {
        $_SESSION['game']['answers'][$current_question] = [];
    }
    
    $_SESSION['game']['answers'][$current_question][] = $answer;
    
    if (count($_SESSION['game']['answers'][$current_question]) === 2) {
        $_SESSION['game']['current_question']++;
    }
    
    header("Location: index.php?action=game");
    exit;
}

header("Location: index.php");
exit;
?>