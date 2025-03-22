<?php
$servername = "localhost"; // Change if using a remote server
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (leave blank)
$database = "navee";

// Connect to database
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data was sent via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];

    $sql = "INSERT INTO locations (latitude, longitude) VALUES ('$lat', '$lon')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
