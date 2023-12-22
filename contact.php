<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style4.css" />
    <title>Contact Us</title>
</head>

<body>
    <header class="header-container"> <!-- Contact Nav -->
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
        <form action="#" method="post"> <!-- Need a name and email to contact the devs -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Full name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Write here.." required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
