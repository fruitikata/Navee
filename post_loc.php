<?php
$servername = "localhost"; //Change if using a remote server
$username = "root"; //XAMPP username
$password = ""; //XAMPP password
$database = "navee";
// Set the content type to application/json
header('Content-Type: application/json');

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if latitude and longitude are provided
    if (isset($data['latitude']) && isset($data['longitude'])) {
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];

        // Here you can add your logic to process the latitude and longitude
        // For example, you could save them to a database or perform calculations

        $sql = "INSERT INTO locations (latitude, longitude) VALUES ('$latitude', '$longitude')";

        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Create a response array
        $response = [
            'status' => 'success',
            'message' => 'Coordinates received successfully',
            'data' => [
                'latitude' => $latitude,
                'longitude' => $longitude,
            ],
        ];
    } else {
        // If required data is not provided
        $response = [
            'status' => 'error',
            'message' => 'Invalid input, latitude and longitude are required',
        ];
    }
} else {
    // If the request method is not POST
    $response = [
        'status' => 'error',
        'message' => 'Only POST requests are allowed',
    ];
}

// Return the response as JSON
echo json_encode($response);
?>