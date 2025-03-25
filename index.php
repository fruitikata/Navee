<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Navee</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <style>
        body{
            margin:2rem;
            margin-top: 0;
            padding-top: 5rem;;
        }
        header {
            position: fixed;
            font-family: 'Poppins', sans-serif;
            top: 0;
            left: 1.5;  
            width: 100%;
            color: rgb(0, 0, 0);
            text-align: start;
            z-index: 1000;
        }
        #map{
            width: 100%;
            height: 75vh;
        }
     </style>
</head>
<body>
    <header>
        <h1>Navee.</h1>
    </header>
    <div id="map"></div>
</body>
</html>

<script>
    var map = L.map('map').setView([9.8400, 124.4699], 13);

    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    function fetchGPSData() {
    fetch('http://localhost/navee/get_loc.php')
        .then(response => response.json())
        .then(data => {


            marker = L.marker([data.lat, data.lon]).addTo(map);

            
        })
        .catch(error => console.error("Error fetching GPS data:", error));
}

//Fetch new data every 5 seconds
setInterval(fetchGPSData, 5000);
fetchGPSData();
</script>