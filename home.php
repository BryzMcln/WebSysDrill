<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit();
}

@include 'connect.php';

// Rest of the code for home.php
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
    <h2>Welcome, <span id="userName"></span></h2>
    <div class="collection">
    </div>

    </div>
  </div>
  <script>
    var userName = "<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?>";
    document.getElementById("userName").innerText = userName;
  </script>
</body>

</html>