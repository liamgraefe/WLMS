<?php
include("dbcon.php");

$query = "SELECT id, name FROM categories";
$result = mysqli_query($connection, $query);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
} else {
    echo '<option disabled>No categories found</option>';
}

?>
