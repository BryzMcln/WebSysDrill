<?php
session_start();

// Check if user is already logged in, redirect to home page
if (isset($_SESSION['email'])) {
    header('location: home.php');
    exit();
}

@include 'connect.php';

$loginError = '';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $select = "SELECT * FROM register WHERE email = ?";

    $stmt = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            // Check if password matches using password_verify
            if ($row && password_verify($password, $row['password'])) {
                $_SESSION['name'] = $row['first_name'];
                $_SESSION['email'] = $row['email'];
                header('location:home.php');
                exit();
            } else {
                $loginError = 'Invalid email or password. Please try again.';
            }
        } else {
            $loginError = 'No rows found in the result.';
        }
    } else {
        $loginError = 'Error in the SQL query: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style0.css" />
    <title>Login</title>
</head>

<body>
    <div class="login-container">
        <form action="" method="post" class="login-form">
            <h1>Login</h1>
            <?php if ($loginError) : ?>
                <p class="error-message"><?php echo $loginError; ?></p>
            <?php endif; ?>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />

            <button type="submit" name="submit">Log In</button>
            <p class="register-link">
                Don't have an account? <a href="register.php">Register now!</a>
            </p>
        </form>
    </div>
</body>

</html>
