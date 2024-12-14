<?php
// Include the database connection
include('db.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the form data to prevent SQL injection and XSS attacks
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $event = htmlspecialchars($_POST['event']);

    // Insert the form data into the database
    $sql = "INSERT INTO registrations (name, email, phone, event)
            VALUES ('$name', '$email', '$phone', '$event')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'>";
        echo "<h2>Registration Successful!</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Selected Event:</strong> $event</p>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "</div>";
    }

    // Close the database connection
    $conn->close();
}
?>
