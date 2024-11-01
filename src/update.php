<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$title = $data['title'];
$url = $data['url'];
$description = $data['description'];

// Suche das Lesezeichen und aktualisiere es
foreach ($_SESSION['bookmarks'] as &$bookmark) {
    if ($bookmark['id'] === $id) {
        $bookmark['title'] = $title;
        $bookmark['url'] = $url;
        $bookmark['description'] = $description;
        break;
    }
}
echo json_encode(["status" => "success", "message" => "Lesezeichen aktualisiert"]);
