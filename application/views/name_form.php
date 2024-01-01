<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <!-- application/views/name_form.php -->
    <form id="nameForm" method="post" action="NameController/check_name_existence">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br />
        <span id="nameMessage" style="color: red;"></span>
    </form>

    <script>
        $(document).ready(function() {
            $('#name').on('input', function() {
                var name = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'NameController/check_name_existence',
                    data: {
                        name: name
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            $('#nameMessage').text('Name already exists!');
                        } else {
                            $('#nameMessage').text('');
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>