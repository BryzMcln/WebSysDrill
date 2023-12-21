<?php

$conn = mysqli_connect('localhost', 'root', '', 'info_database');

if ($conn) {
    // Database connected successfully!
} else {
    die("Connection failed: " . mysqli_connect_error());
}
?>