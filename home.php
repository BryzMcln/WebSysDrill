<?php
session_start();
@include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style2.css" />
    <title>Home</title>
    <script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
</head>

<body>
    <header>
        <div class="header-content">
            <!-- Home Header Navigation -->
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
        <?php if (isset($_SESSION['email'])) : ?>
            <h2>Welcome, <span id="userName">
                    <?php echo $_SESSION['name']; ?>
                </span></h2>
        <?php else : ?>
            <h2>Welcome, Guest</h2>
        <?php endif; ?>
        <div class="collection">
            <?php if (!isset($_SESSION['email'])) : ?>
                <!-- Encourage login link -->
                <p>Enjoying the content?  <a href="login.php">Log in</a>  to personalize your experience!</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        var userName = "<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?>";
        document.getElementById("userName").innerText = userName;
    </script>
</body>

</html>
