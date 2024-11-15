<?php
include("dbcon.php");

// Fehleranzeige aktivieren
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // zeige detaillierte SQL-Fehler
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["name"], $_POST["url"])) {
    $name = $_POST["name"];
    $url = $_POST["url"];
    $description = $_POST["description"];
    $category = (int) isset($_POST["category"]) ? $_POST["category"] : null;;

    $query = "INSERT INTO bookmarks (name, url, description, category_id) VALUES ('$name', '$url', '$description', '$category')";

    try {
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "Bookmark added successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to add bookmark: " . mysqli_error($connection)]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Incomplete form data."]);
}
?>



