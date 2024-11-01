<?php

// Start der Session (falls benötigt)
session_start();

// Bestimme, welche Funktion aufgerufen wird (z. B. "create", "read", "update", "delete")
$action = $_GET['action'] ?? '';

// Verweise auf die entsprechenden Skripte im src-Ordner basierend auf der Aktion
switch ($action) {
    case 'create':
        require_once '../src/create.php';
        break;
    case 'read':
        require_once '../src/read.php';
        break;
    case 'update':
        require_once '../src/update.php';
        break;
    case 'delete':
        require_once '../src/delete.php';
        break;
    default:
        echo json_encode(["status" => "error", "message" => "Ungültige Aktion"]);
        break;
}
