// public/js/map.js

const map = L.map('map').setView([53.326808, -2.755291], 13); // Set the initial map coordinates and zoom level

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Add bus stops as markers
@foreach ($route->stops as $stop)
L.marker([{{ $stop->latitude }}, {{ $stop->longitude }}])
    .bindPopup('{{ $stop->stop_name }}')
    .addTo(map);
@endforeach

// Add bus route as a line
const routePoints = [
    // Define the route coordinates here
];

const routeLine = L.polyline(routePoints, { color: 'blue' }).addTo(map);
