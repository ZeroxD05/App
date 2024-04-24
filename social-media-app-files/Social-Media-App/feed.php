<?php
// Start session
session_start();

// Check if the "username" session variable is set
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ./login.php");
    exit();
}

// Include the database connection file
include_once './php/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feed</title>

    <!-- Boxicons CDN -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css" />
    <script defer src="js/main.js"></script>
</head>
<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span style="font-size: 24px;">Welcome back!</span>
                <header>
                    <?php
                    // Query the database to retrieve username
                    $username = $_SESSION['username'];
                    $sql = "SELECT username FROM users WHERE username = '$username'";
                    $result = $conn->query($sql);

                    // Check if the query returned any rows
                    if ($result && $result->num_rows > 0) {
                        // Fetch the first row
                        $row = $result->fetch_assoc();

                        // Echo out the username
                        echo "Username: " . $row['username'];
                    } else {
                        // No user found in the database
                        echo "User not found";
                    }
                    ?>
                </header>
                <div class="sidenote-from-dev" style="color: white; text-align: center; margin: 20px 0px">
                  Only users who a logged in can see this site. Others must log in to be able to see this.
                </div>
            </div>
            <div class="logout-btn" style="display: grid; place-items: center;">
                <button id="logout-btn" onclick="window.location.href='./php/logout.php'">Logout</button>
            </div>
        </div>
    </div>
</body>
</html>
