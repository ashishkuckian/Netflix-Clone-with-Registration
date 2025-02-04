<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sign In</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    
    <div class="login-top">
      <a href="index.html">
        <img src="Images/logo.png" width="132" height="39"> 
      </a>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="width: 100vw;">
      <section class="login-container">
        <div class="login-box">
            <h2 class="login-title">Sign In</h2>
            <!-- Form now posts to 'login.php' for processing -->
            <form class="login-form" action="login.php" method="POST">
                <div class="input-group">
                    <input type="email" class="input-field" name="email" id="email" placeholder=" " required>
                    <label for="email" class="input-label">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" class="input-field" name="password" id="password" placeholder=" " required>
                    <label for="password" class="input-label">Password</label>
                </div>
                <button type="submit" class="submit-btn">Sign In</button>
                <div class="signup-link">
                    <p class="text">New to Netflix? <a href="signup.php">Sign up now.</a></p>
                </div>
            </form>
        </div>
    </section>
    </div>

  </body>
</html>
