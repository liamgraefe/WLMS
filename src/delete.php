<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];

$_SESSION['bookmarks'] = array_filter($_SESSION['bookmarks'], function ($bookmark) use ($id) {
    return $bookmark['id'] !== $id;
});
echo json_encode(["status" => "success", "message" => "Lesezeichen gelöscht"]);
