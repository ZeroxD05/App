<?php
session_start();
// Include the database connection file
require_once './php/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement to select user data from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows == 1) {
        // Fetch the password hash from the database
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the provided password against the stored hash
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session and redirect to feed.php
            $_SESSION['username'] = $username;
            header("Location: feed.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect username or password";
        }
    } else {
        // Username not found in the database
        echo "User not found";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Boxicons CDN -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css" />
    <script defer src="js/main.js"></script>
  </head>
  <body>
    <div class="box">
      <div class="container">
        <div class="top-header">
          <span>Codehxb</span>
          <header>Login</header>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="input-field">
            <input type="text" name="username" class="input" placeholder="Username" required />
            <i class="bx bx-user"></i>
          </div>
          <div class="input-field">
            <input type="password" name="password" class="input" placeholder="Password" required />
            <i class="bx bx-lock alt"></i>
          </div>
          <div class="input-field">
            <input type="submit" class="submit" value="Login" />
          </div>
        </form>
        <?php if (isset($error)) : ?>
        <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="bottom">
          <div class="right">
            <label>
              <a href="./register" style="color: lightblue; cursor: pointer;">Register here!</a>
            </label>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
</body>
</html>