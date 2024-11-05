<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Creation and Data Handling</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .form-container { margin-bottom: 20px; }
        .code { background-color: #f4f4f4; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>

<h1>PHP Form Creation and Data Handling</h1>

<!-- Form Section -->
<div class="form-container">
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</div>

<?php
// PHP Section to Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Display the submitted data
    echo "<h2>Submitted Data:</h2>";
    echo "<div class='code'>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Message: $message<br>";
    echo "</div>";
}
?>

</body>
</html>