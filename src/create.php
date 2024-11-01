<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Erwarte POST-Daten für ein neues Lesezeichen
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];

    // Temporäre Speicherung in einer Session (später durch die Datenbank ersetzen)
    //session_start();
    $_SESSION['bookmarks'][] = [
        'id' => uniqid(),
        'title' => $title,
        'url' => $url,
        'description' => $description,
    ];
    echo json_encode(["status" => "success", "message" => "Lesezeichen hinzugefügt"]);
}
