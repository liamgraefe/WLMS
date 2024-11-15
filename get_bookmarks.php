<?php
include("dbcon.php");

$query = "SELECT B.id AS bookmark_id, B.name AS bookmark_name, B.url, B.description, C.name AS category_name
          FROM bookmarks AS B
          JOIN categories AS C ON B.category_id = C.id";

$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['bookmark_id']}</td>
                <td>{$row['bookmark_name']}</td>
                <td><a href='{$row['url']}'>{$row['url']}</a></td>
                <td>{$row['description']}</td>
                <td>{$row['category_name']}</td>
                <td><a href='edit.php?id={$row['bookmark_id']}' class='btn btn-success'>Edit</a></td>
                <td><a href='delete.php?id={$row['bookmark_id']}' class='btn btn-danger'>Delete</a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Keine Einträge gefunden</td></tr>";
}
?>
