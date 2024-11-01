<?php
//session_start();
header('Content-Type: application/json');

// Gibt alle gespeicherten Lesezeichen zurück
echo json_encode($_SESSION['bookmarks'] ?? []);
