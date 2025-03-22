function fetchGPSData() {
    fetch('get_loc.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById("latitude").innerText = data.lat;
            document.getElementById("longitude").innerText = data.lon;
        })
        .catch(error => console.error("Error fetching GPS data:", error));
}

// Fetch new data every 5 seconds
setInterval(fetchGPSData, 5000);
fetchGPSData();
