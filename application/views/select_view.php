<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select_view</title>
</head>

<body>
    <h6>select_view</h6>
    <form>
        <label>select table</label>
        <select id="table_select">
            <option>---select---</option>
            <?php foreach ($tables as $table) : ?>
                <option value="<?= $table ?>"><?= $table ?></option>
            <?php endforeach; ?>
        </select>

        <h2>Select Field:</h2>
        <select id="field_select"></select>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Handle table selection change
                $('#table_select').on('change', function() {
                    var selectedTable = $(this).val();

                    // Make AJAX request to get fields for the selected table
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('Select_tables/get_fields') ?>',
                        data: {
                            table_name: selectedTable
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Populate the second select with fields
                            var fieldSelect = $('#field_select');
                            fieldSelect.empty();
                            $.each(response, function(index, field) {
                                fieldSelect.append('<option value="' + field + '">' + field + '</option>');
                            });
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Handle table selection change
                $('#table_select').on('change', function() {
                    var selectedTable = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('Select_tables/get_fields_data') ?>',
                        data: {
                            table_name: selectedTable
                        },
                        dataType: 'json',
                        success: function(response) {
                            var fieldSelect = $('#field_select');
                            fieldSelect.empty();
                            $.each(response.fields_data, function(index, rowData) {
                                fieldSelect.append('<option value="' + rowData.name + '">' + rowData.name + '</option>');
                            });
                        }
                    });
                });
            });
        </script>

    </form>
</body>

</html>