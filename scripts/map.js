        // Initialize the map and set its view to a geographical center and zoom level
        const map = L.map('map').setView([38.9859, -76.9421], 13); // Center on College Park
        // Store lat and lon to load to the input fields
        const latInput = document.getElementById('lat');
        const lonInput = document.getElementById('lon');
        var currentMarker; // Current marker to only have one marker at a time
        var treeMarker = L.icon({
            iconUrl: "https://img.icons8.com/officel/100/deciduous-tree.png",
            iconAnchor:   [0, 0], // point of the icon which will correspond to marker's location
        })
        // Add a tile layer from Carto
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 20
        }).addTo(map);
        // Add a new tree
        map.on('click', function(e) {
            // Store lat/long in variables
            var lat = e.latlng.lat;
            var lon = e.latlng.lng;
            // Update the input fields with the variables
            latInput.value = lat; 
            lonInput.value = lon;
            // If a marker already exists in the map, remove it
            if (currentMarker) {
                map.removeLayer(currentMarker);
            }
            // Add a new market with the recently created variables
            currentMarker = L.marker(e.latlng, {
                icon: treeMarker
            }).addTo(map);
        })