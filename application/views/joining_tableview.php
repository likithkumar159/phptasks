<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>joining_tableview</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div>
        <h2>table view</h2>
        <table id="tableajax" class="table" >
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Value</th>
                </tr>
            </thead>
        </table>
        <a href="<?php echo base_url('Joining_contorl/export_csv'); ?>">Export as CSV</a>
    </div>
    <script>
        $(document).ready(function() {
            // alert("entering");
            $('#tableajax').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url('Joining_contorl/get_table_data') ?>",
                    "type": "POST",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "value" }
                    // Add more columns as needed
                ]
            });
        });
    </script>
</body>

</html>
