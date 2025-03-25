<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "navee";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT latitude, longitude FROM locations ORDER BY timestamp DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["lat" => $row["latitude"], "lon" => $row["longitude"]]);
} else{
    echo json_encode(["lat" => "N/A", "lon" => "N/A"]);
}

$conn->close();
?>
