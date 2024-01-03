<?php
session_start();

// Include the connection file
@include 'connect.php';

// Check if email is set in session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Fetch user details from the database based on the session email
    $select = "SELECT * FROM register WHERE email = ?";
    $stmt = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if (!$user) {
            // Handle the case where no user is found
            die("Error: User not found");
        }
    } else {
        // Handle error if needed
        die("Error fetching user details: " . mysqli_error($conn));
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style4.css" />
    <title>Contact Us</title>
</head>

<body>
    <header class="header-container">
        <div class="header-content">
            <div class="logo-container">
                <h1 class="site-title">Contact Us</h1>
            </div>
            <nav class="main-nav">
                <ul class="sel-main">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="contact-form">
        <?php if (isset($_SESSION['email'])) : ?>
            <form action="#" method="post">
                <!-- Your contact form goes here -->
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Full name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="john@example.com" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" placeholder="Write here.." required></textarea>

                <button type="submit">Submit</button>
            </form>
        <?php else : ?>
            <p class="login-message">To contact us, please <a href="login.php">Login</a>.</p>
        <?php endif; ?>
    </div>
</body>

</html>
