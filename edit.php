<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>


<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];



    $query = "SELECT * FROM bookmarks where id = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

?>


<?php
if (isset($_POST["update_bookmarks"])) {

    if(isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $name = $_POST["name"];
    $url = $_POST["url"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    $query = "UPDATE bookmarks SET name = '$name', url = '$url', description = '$description', category_id = '$category' where id = '$idnew'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        header("location:index.php?update_msg=Bookmark updated successfully!");
    }
}
?>
<form class="edit-form" action="edit.php?id_new=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" name="url" class="form-control" value="<?php echo $row['url']; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <input type="number" name="category" class="form-control" value="<?php echo $row['category_id']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_bookmarks" value="UPDATE">
</form>



<?php include("footer.php"); ?>