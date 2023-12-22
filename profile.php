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
} else {
    // Handle the case where email is not set in the session
    die("Error: Email not set in session");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style3.css" />
    <title>Profile Page</title>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo-container">
                <h1 class="site-title">Profile</h1>
            </div>
            <nav class="main-nav">
                <ul class="sel-main">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <!-- Inside the navigation section of profile.php -->
                <ul class="log-out">
                    <li><a href="logout.php">Sign out</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="form-container">
        <div class="personal-info">
            <img src="profile.jpeg" alt="Profile Image" class="prof_img" />
            <ul class="ul1">
                <li><strong>Name:</strong>
                    <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                </li>
                <li><strong>Email:</strong> <em>
                        <?php echo $user['email']; ?>
                    </em></li>
                <li><strong>Contact Number:</strong>
                    <?php echo $user['phone_num']; ?>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
