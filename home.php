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
    // Redirect to login page if the user is not logged in
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style2.css" />
    <title>Profile</title>
    <script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
</head>

<body>
    <header>
        <div class="header-content"> <!-- Profile Header Navigation -->
            <div class="logo-container">
                <img src="logo.png" alt="Website Logo" class="logo-image" />
                <h1 class="site-title">WebSite</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="user-welcome" id="userWelcome">
        <h2>Welcome, <span id="userName">
                <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?>
            </span></h2> <!-- Displaying the user's name or 'Guest' -->
        <div class="collection">
            <!-- Profile content goes here -->
        </div>
    </div>

</body>

</html>