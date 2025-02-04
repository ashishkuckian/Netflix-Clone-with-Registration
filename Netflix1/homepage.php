<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Inline CSS for background image -->
    <style>
      body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('Images/background-banner.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
      }

      .container {
        background-color: rgba(255, 255, 255, 0.9); /* Adds a white overlay with some transparency */
        padding: 20px;
        border-radius: 10px;
        margin-top: 40px;
      }
      .login-top{
        padding: 20px;
      }
    </style>
  </head>
  <body>
  <div class="login-top">
      <a href="index.html">
        <img src="Images/logo.png" width="132" height="39"> 
      </a>
    </div>

    <div class="container text-center">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>You are now logged in.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </body>
</html>
