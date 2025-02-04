<?php
// Start the session
session_start();

// Include the database connection
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE Email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password using password_verify
        if (password_verify($password, $user['Password'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $user['id']; // Assuming `id` is the user's unique identifier
            $_SESSION['username'] = $user['Username'];

            // Redirect to the homepage or dashboard
            header("Location: homepage.php");
            exit();
        } else {
            echo "<div class='message'><p>Incorrect password. Please try again.</p></div><br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        }
    } else {
        echo "<div class='message'><p>No user found with this email.</p></div><br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
