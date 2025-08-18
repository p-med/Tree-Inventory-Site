// Initialize the map and set its view to a geographical center and zoom level
const map = L.map("map").setView([38.9859, -76.9421], 13); // Center on College Park

// Add a tile layer from Carto
L.tileLayer("https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png", {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
  subdomains: "abcd",
  maxZoom: 20,
}).addTo(map);
var treeMarker = L.icon({
  iconUrl: "https://img.icons8.com/fluency/48/coniferous-tree.png",
  iconAnchor: [0, 0], // point of the icon which will correspond to marker's location
});
// Add markers
function addMarker(feature) {
  // Create a Leaflet LatLng object from the position property
  const latlng = L.latLng(feature.lat, feature.lon);

  // Create the marker and add it to the map
  const marker = L.marker(latlng, {icon: treeMarker}).addTo(map);

  // Create a popup to display information for the marker
  const popupContent = `
    <b>Common Name:</b> ${feature.common_name}<br>
    <b>Date:</b> ${feature.date}<br>
    <b>DBH:</b> ${feature.dbh}<br>
    <b>Height:</b> ${feature.height}<br>
    <b>Density:</b> ${feature.density}<br>
    <b>Type:</b> ${feature.type}<br>
    <b>Carbon Storage:</b> ${feature.carbon_storage}
`;

  // Bind the popup to the marker
  marker.bindPopup(popupContent);
}

const xhttp = new XMLHttpRequest();

xhttp.onload = function () {
  const data = this.responseText;
  // allj will now be an array of objects
  const allj = JSON.parse(data);

  allj.forEach(function (tree) {
    const feature = {
      common_name: tree.common_name,
      date: tree.date,
      dbh: tree.dbh,
      height: tree.height,
      density: tree.density,
      type: tree.type,
      carbon_storage: tree.carbon_storage,
      lat: parseFloat(tree.lat), // It's a good practice to ensure these are numbers
      lon: parseFloat(tree.lon), // It's a good practice to ensure these are numbers
    };
    addMarker(feature);
  });
};

xhttp.open("GET", "map.php", true);
xhttp.send();
