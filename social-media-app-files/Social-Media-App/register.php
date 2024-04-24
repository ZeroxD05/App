<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="box">
    <div class="container">
        <div class="top-header">
            <span>Codehxb</span>
            <header>Register</header>
        </div>

        <?php
        // Include the database connection file
        require_once './php/config.php';

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate input
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute SQL statement to insert user data into the database
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);
            
            if ($stmt->execute()) {
                // Registration successful
                header("Location: ./login");
                exit();
            } else {
                // Registration failed
                echo "Error: " . $conn->error;
            }

            // Close statement
            $stmt->close();
        }

        // Close database connection
        $conn->close();
        ?>

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
                <input type="submit" class="submit" value="Register" />
            </div>
        </form>

        <div class="bottom">
            <div class="right">
                <label>
                    <a>Already registered?</a>
                    <a href="./login" style="color: lightblue; cursor: pointer;">Login here!</a>
                </label>
            </div>
        </div>
    </div>
</div>
</body>
</html>
