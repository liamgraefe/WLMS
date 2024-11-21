</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function() {
            // AJAX-Request load categories
            $.ajax({
                url: 'get_categories.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const dropdown = $('#dropdown');
                    dropdown.empty();

                    // fill dropdown
                    if (data.length > 0) {
                        data.forEach(category => {
                            dropdown.append(`<option value="${category.id}">${category.name}</option>`);
                        });
                    } else {
                        dropdown.append('<option disabled>No categories found</option>');
                    }
                },
                error: function() {
                    console.error("Could not load categories.");
                }
            });
        });
        // send form
        $('#bookmarkForm').on('submit', function(e) {
            e.preventDefault();

            // gather form data
            const formData = $(this).serialize();

            $.ajax({
                url: 'insert_data.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === "success") {
                        // TODO: Fix
                        $('#exampleModal').modal('hide');

                        // update table
                        loadTableData();

                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", textStatus, errorThrown);
                    alert("Error: " + jqXHR.responseText);
                }

            });
        });

        // delete bookmark
        $(document).on('click', '.delete', function() {
            const id = $(this).data('id');

            if (confirm("Are you sure?")) {
                $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function() {
                        loadTableData();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX error:", textStatus, errorThrown);
                        alert("Error while deleting entry.");
                    }
                });
            }
        });
        // dynamic table loading
        function loadTableData() {
            $.ajax({
                url: 'get_bookmarks.php',
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('table tbody').html(data);
                },
                error: function() {
                    console.error("Error on table loading.");
                }
            });
        }

        // initial table load call
        loadTableData();
    });
</script>

</body>

</html>