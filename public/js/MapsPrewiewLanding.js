var map = L.map('map', {
    dragging: false, // Menonaktifkan drag
    tap: false // Menonaktifkan touch
}).setView([0, 0], 2); // Sesuaikan koordinat dan zoom level sesuai kebutuhan Anda

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Mengaktifkan kembali drag saat pengguna mengklik peta
map.on('click', function() {
    map.dragging.enable();
    map.tap.enable();
});
