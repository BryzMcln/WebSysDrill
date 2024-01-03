<?php
session_start();

// Check if user is already logged in, redirect to home page
if (isset($_SESSION['email'])) {
    header('location: home.php');
    exit();
}

@include 'connect.php';

$registerError = '';

if (isset($_POST['submit'])) {
    // Validate and sanitize input data
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNum = mysqli_real_escape_string($conn, $_POST['phone_num']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validation and error handling (customize as needed)
    // ...

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $insert = "INSERT INTO register (first_name, last_name, email, phone_num, password) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $insert);
    mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $phoneNum, $hashedPassword);


    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['name'] = $firstName;
        $_SESSION['email'] = $email;
        header('location: home.php');
        exit();
    } else {
        $registerError = 'Error registering user: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style1.css" />
    <script src="reg_js.js"></script>
    <title>Register</title>
</head>

<body>
    <div class="register-container">
        <h1 class="head-title">Register</h1>
        <?php if ($registerError) : ?>
        <p class="error-message">
            <?php echo $registerError; ?>
        </p>
        <?php endif; ?>
        <form action="" method="post" class="register-form">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required />

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="phone_num">Phone Number:</label>
            <input type="text" id="phone_num" name="phone_num" maxlength="11" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required />

            <button type="submit" name="submit">Register</button>
            <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>

</html>