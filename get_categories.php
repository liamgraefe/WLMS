<?php
include("dbcon.php");

// $query = "SELECT id, name FROM categories";
// $result = mysqli_query($connection, $query);

// $categories = [];
// if ($result) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $categories[] = $row;
//     }
//     echo json_encode($categories); // JSON-Ausgabe der Kategorien
// } else {
//     echo json_encode([]); // Rückgabe eines leeren Arrays bei Fehlern
// }


$query = "SELECT id, name FROM categories";
$result = mysqli_query($connection, $query);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
} else {
    echo '<option disabled>Keine Kategorien gefunden</option>';
}

?>
