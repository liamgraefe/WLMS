    <?php include("header.php"); ?>
    <?php include("dbcon.php"); ?>


    <div class="box1">
        <h2>Bookmarks</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Bookmark</button>
    </div>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Description</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = "SELECT * FROM bookmarks";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed" . mysqli_error($connection));
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><a href="url"><?php echo $row['url']; ?></a></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

            <?php

                }
            }

            ?>
        </tbody>
    </table>

    <?php
    if (isset($_GET['message'])) {
        echo "<h6>" . $_GET['message'] . "</h6>";
    }
    ?>
    <?php
    if (isset($_GET['insert_msg'])) {
        echo "<h6>" . $_GET['insert_msg'] . "</h6>";
    }
    ?>
    <?php
    if (isset($_GET['update_msg'])) {
        echo "<h6>" . $_GET['update_msg'] . "</h6>";
    }
    ?>
    <?php
    if (isset($_GET['delete_msg'])) {
        echo "<h6>" . $_GET['delete_msg'] . "</h6>";
    }
    ?>

    <!-- Modal -->
    <form action="insert_data.php" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD BOOKMARK</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name
                            <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" class="form-control" required maxlength="60">
                        </div>
                        <div class="form-group">
                            <label for="url">URL
                            <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="url" class="form-control" pattern="https?://.*" placeholder="https://example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <!-- <label for="category">Category</label>
                            <input type="number" name="category" class="form-control"> -->
                            <label for="category" class="form-label">Pick a category:</label>
                            <select class="form-select" id="dropdown" name="category">
                                <option value="0">None</option>
                                <option value="1">Entertainment</option>
                                <option value="2">Social Media</option>
                                <option value="3">Shopping</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_bookmark" value="ADD">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php include("footer.php"); ?>

