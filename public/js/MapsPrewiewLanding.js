var map = L.map('map', {
    dragging: false,
    tap: false
}).setView([-4.9180, 105.1997], 7);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Example coordinates for Lampung province boundary (not accurate, for illustration purposes)
var lampungCoordinates = [
    [-4.4368, 104.3762],
    [-4.5383, 104.5863],
    [-5.0314, 104.6358],
    [-5.3931, 104.8270],
    [-5.6726, 104.7172],
    [-5.7633, 104.9444],
    [-5.9280, 105.1406],
    [-5.7861, 105.3536],
    [-5.5339, 105.2349],
    [-5.2971, 105.2566],
    [-4.9079, 105.0174],
    [-4.6050, 104.8722],
    [-4.4368, 104.3762]
];

var lampungPolygon = L.polygon(lampungCoordinates, {
    color: 'blue',
    weight: 2,
    fillColor: 'lightblue',
    fillOpacity: 0.5
}).addTo(map);

map.on('click', function() {
    map.dragging.enable();
    map.tap.enable();
});