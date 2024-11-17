<?php
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = "Bhk@2005/"; // default for XAMPP
$dbname = "event_management"; // Your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
