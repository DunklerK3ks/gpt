<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['game']) && $_SESSION['game']['joiner'] !== null) {
    echo json_encode(['status' => 'ready']);
} else {
    echo json_encode(['status' => 'waiting']);
}
?>