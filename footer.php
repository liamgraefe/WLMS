</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function() {
            // AJAX-Anfrage, um Kategorien abzurufen und Dropdown zu füllen
            $.ajax({
                url: 'get_categories.php', // Das PHP-Skript, das die Kategorien zurückgibt
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const dropdown = $('#dropdown');
                    dropdown.empty(); // Alle alten Optionen entfernen

                    // Optionen hinzufügen, falls Kategorien existieren
                    if (data.length > 0) {
                        data.forEach(category => {
                            dropdown.append(`<option value="${category.id}">${category.name}</option>`);
                        });
                    } else {
                        dropdown.append('<option disabled>Keine Kategorien gefunden</option>');
                    }
                },
                error: function() {
                    console.error("Fehler beim Laden der Kategorien.");
                }
            });
        });
        // Formular per AJAX absenden
        $('#bookmarkForm').on('submit', function (e) {
            e.preventDefault(); // Standardformularverhalten verhindern

            // Formulardaten sammeln
            const formData = $(this).serialize();

            $.ajax({
                url: 'insert_data.php', // PHP-Skript zum Einfügen des neuen Datensatzes
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === "success") {
                        // Modal schließen
                        $('#exampleModal').modal('hide');

                        // Tabelle aktualisieren
                        loadTableData();

                        // Optional: Erfolgsmeldung anzeigen
                        alert(response.message);
                    } else {
                        // Fehlerhinweis aus der JSON-Antwort anzeigen
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", textStatus, errorThrown); // Konsolen-Log für Details
                    alert("Fehler beim Hinzufügen des Bookmarks: " + jqXHR.responseText);
                }

            });
        });


        // Funktion zum dynamischen Laden der Tabelle
        function loadTableData() {
            $.ajax({
                url: 'get_bookmarks.php', // PHP-Skript zum Abrufen der Tabelle
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('table tbody').html(data); // Tabelle mit den neuen Daten aktualisieren
                },
                error: function() {
                    console.error("Fehler beim Laden der Tabelleninhalte.");
                }
            });
        }

        // Initialer Aufruf zum Laden der Tabelle
        loadTableData();
    });
</script>

</body>

</html>