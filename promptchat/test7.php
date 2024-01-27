<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Form</title>
</head>
<body>

<form id="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <input type="submit" value="Submit">
</form>

<script>


document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get form data
    var formData = new FormData(event.target);

    // Define headers
    var headers = {
        'Content-Type': 'application/x-www-form-urlencoded', // Adjust content type as needed
    };

    // Define payload
    var payload = formData;

    // Make AJAX request using the global function
    makeAjaxRequest('process_form.php', 'POST', headers, payload, function(error, response) {
        if (error) {
            console.error(error);
        } else {
            console.log(response);
        }
    });
});
</script>

</body>
</html>
