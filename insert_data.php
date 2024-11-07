<?php
include("dbcon.php");
if(isset($_POST["add_bookmark"])) {

    $name = $_POST["name"];
    $url = $_POST["url"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    if($name == "" || empty($name)) {
        header("location:index.php?message=You need to enter a name!");
    }

    else {
        $query = "INSERT INTO bookmarks (name, url, description, category_id) VALUES ('$name', '$url', '$description', '$category')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            header("location:index.php?insert_msg=Bookmark added successfully!");
        }
    }

}