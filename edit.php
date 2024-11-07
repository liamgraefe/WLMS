<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>


<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<form>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control">
</div>
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" name="url" class="form-control">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control">
</div>
<div class="form-group">
    <label for="category">Category</label>
    <input type="number" name="category" class="form-control">
</div>
</form>



<?php include("footer.php"); ?>