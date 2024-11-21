<?php include("dbcon.php"); ?>

<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM bookmarks WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    try {
        $result = mysqli_query($connection, $query);

        if ($result) {
            http_response_code(200);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete bookmark: " . mysqli_error($connection)]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error"]);
}

?>