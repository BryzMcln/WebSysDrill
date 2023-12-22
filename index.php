<?php
session_start();

// Check if user is logged in, redirect to home page
if (isset($_SESSION['email'])) {
    header('location: home.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Website</title>
</head>

<body>
    <header class="header-panel">
        <h1>Hello World, <span class="auto-type"></span></h1> <!-- type animation-->
    </header>
    <div class="button-container">
        <a href="login.php" class="custom-button">
            <p>Log In</p>
        </a>
        <a href="register.php" class="custom-button">
            <p>Sign Up</p>
        </a>
        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
        <script>
            var typed = new Typed(".auto-type", {
                strings: ["How are yah?", "Y'all good?", "Sup!", "Let's get started!",
                    "Eat Nice", "Code Well", "Sleep Noicely"],
                typeSpeed: 30,
                backSpeed: 40,
                loop: true
            })
        </script>
    </div>
</body>

</html>

