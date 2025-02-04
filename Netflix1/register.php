<?php
// Database connection
$servername = "localhost"; // or your host
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "netflix";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['signUpName'];
    $age = $_POST['signUpAge'];
    $email = $_POST['signUpEmail'];
    $password = $_POST['signUpPassword'];

    // Validate input data (basic example)
    if (empty($full_name) || empty($age) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (full_name, age, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $full_name, $age, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
