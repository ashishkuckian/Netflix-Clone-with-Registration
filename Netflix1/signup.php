<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    
    <div class="login-top">
      <a href="index.html">
        <img src="Images/logo.png" width="132" height="39" alt="Logo">
      </a>
    </div>

    <?php 
    include("config.php"); // Database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if the form was submitted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $password = $_POST['password'];

        // Verifying the unique email
        $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

        if (mysqli_num_rows($verify_query) != 0) {
            echo "<div class='message'>
                      <p>This email is already in use. Try another one, please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $insert_query = "INSERT INTO users(Username, Email, Age, Password) VALUES('$username', '$email', '$age', '$hashed_password')";
            
            if (mysqli_query($con, $insert_query)) {
                echo "<div class='message'>
                          <p>Registration successful!</p>
                      </div> <br>";
                echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
            } else {
                echo "<div class='message'>
                          <p>Error occurred: " . mysqli_error($con) . "</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            }
        }
    } else {
    ?>

    <div class="d-flex justify-content-center align-items-center" style="width: 100vw;">
        <section class="login-container">
            <div class="login-box">
                <h2 class="login-title">Sign Up</h2>
                <!-- The form for sign-up -->
                <form class="login-form" action="" method="POST">
                    <!-- Full Name Field -->
                    <div class="input-group">
                        <input type="text" class="input-field" name="username" id="signUpName" placeholder=" " autocomplete="off" required>
                        <label for="signUpName" class="input-label">Full Name</label>
                    </div>
                    <!-- Age Field -->
                    <div class="input-group">
                        <input type="number" class="input-field" name="age" id="signUpAge" placeholder=" " autocomplete="off" required min="1">
                        <label for="signUpAge" class="input-label">Age</label>
                    </div>
                    <!-- Email Address Field -->
                    <div class="input-group">
                        <input type="email" class="input-field" name="email" id="signUpEmail" placeholder=" " autocomplete="off" required>
                        <label for="signUpEmail" class="input-label">Email Address</label>
                    </div>
                    <!-- Password Field -->
                    <div class="input-group">
                        <input type="password" class="input-field" name="password" id="signUpPassword" placeholder=" " autocomplete="off" required>
                        <label for="signUpPassword" class="input-label">Password</label>
                    </div>
                    <!-- Sign Up Button -->
                    <button type="submit" class="submit-btn">Sign Up</button>
                    <!-- Redirect to Sign In -->
                    <div class="signup-link">
                        <p class="text">Already have an account? <a href="loginform.php">Sign in now.</a></p>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <?php } ?>

    <!-- Optional JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

  </body>
</html>
