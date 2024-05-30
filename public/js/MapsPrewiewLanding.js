var map = L.map('map', {
    dragging: false,
    tap: false
}).setView([-4.9180, 105.1997], 7);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

map.on('click', function() {
    map.dragging.enable();
    map.tap.enable();
});