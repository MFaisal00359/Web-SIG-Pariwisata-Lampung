// Inisialisasi peta dengan satu objek mapView
var mapView = L.map('map').setView([-5.677747221170379, 105.51610569011895], 10); 

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mapView);

var locations = [
    {coords: [-5.41835532956698, 105.31120249660316], message: 'Bukit Aslan'},
    {coords: [-5.741278711725356, 105.6556167394477], message: 'Way Tebing Cepa'},
    {coords: [-5.677747221170379, 105.51610569011895], message: 'Pantai Marina Lampung Selatan'}
];

locations.forEach(function(location) {
    var popup = L.popup().setContent(location.message); // Tetapkan pesan popup ke objek popup
    L.marker(location.coords).addTo(mapView)
        .bindPopup(popup) // Gunakan objek popup yang telah ditetapkan
        .openPopup();
});