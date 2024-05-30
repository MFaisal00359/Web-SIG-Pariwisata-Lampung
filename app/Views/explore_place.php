<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Place</title>
    <link rel="stylesheet" href="<?= base_url('leaflet/leaflet.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('logo/favicon.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        #map {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #search-container {
            position: absolute;
            top: 25px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            width: wrap;
            z-index: 1000;
            border: none;
            background-color: #fff;
            border-radius: 500px;
            padding: 10px;
        }
        #search-container input[type="text"] {
            flex-grow: 1;
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 50px;
            margin-right: 10px;
        }
        #search-container button {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        #search-container button:hover {
            background-color: #e68a00;
        }
        #search::placeholder {
            color: #999;
        }
        .legend {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 10px;
            z-index: 1000;
        }
        .legend h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .legend p {
            margin: 0;
            font-size: 14px;
        }
        .legend span {
            font-weight: bold;
        }
        .autocomplete-list {
            position: absolute;
            top: 110%;
            left: 0;
            right: 0;
            background-color: #fff;
            border-radius: 20px;
            scroll-behavior: smooth;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }
        .autocomplete-list::-webkit-scrollbar{
            width: 2px;
        }
        .autocomplete-list li {
            padding: 20px;
            cursor: pointer;
        }
        .autocomplete-list li:hover {
            background-color: #f0f0f0;
        }
        .back-button {
            position: absolute;
            top: 25px;
            right: 20px;
            background-color: #3490dc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 500px;
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 1000;
        }
        .back-button:hover {
            background-color: #2779bd;
        }
        .card-popup {
            position: absolute;
            top: 20%;
            left: 20px;
            width: 300px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
            transition: transform 0.3s ease-in-out;
        }
        .card-popup.active {
            display: block;
            transform: translateX(0);
        }
        .card-popup img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-popup-content {
            padding: 15px;
        }
        .card-popup-content h3 {
            margin: 0;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .card-popup-content p {
            margin: 1rem 0;
        }
        .card-popup-content .btn {
            margin-top: 10px;
        }
        .card-popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body class="relative h-full">

    <div id="search-container">
        <input type="text" id="search" placeholder="Search for places">
        <button id="search-button">Search</button>
        <ul id="autocomplete-list" class="autocomplete-list"></ul>
    </div>

    <div id="map"></div>

    <div id="card-popup" class="card-popup">
        <div class="card-popup-close" onclick="closePopup()">✖</div>
        <img id="card-popup-img" src="" alt="Place Image">
        <div class="card-popup-content">
            <h3 id="card-popup-name">Place Name</h3>
            <p id="card-popup-location">Location</p>
            <a id="card-popup-link" href="#" class="btn bg-yellow-500 text-white py-2 px-4 rounded-full hover:bg-yellow-600">Detail</a>
        </div>
    </div>

    <button onclick="window.location.href='<?= site_url('/'); ?>'" class="back-button">Back</button>

    <script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
    <script>
        var map = L.map('map').setView([-4.9180, 105.1997], 8); // zoom 8

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Informasi marker
        var places = <?= json_encode($places) ?>;

        places.forEach(function(place) {
            var marker = L.marker([place.latitude, place.longitude]).addTo(map).bindPopup(`<b>${place.name}</b><hr/>${place.location}<br>${place.latitude}, ${place.longitude}`);
            
            marker.on('click', function() {
                openPopup(place);
            });
        });

        document.getElementById('search-button').addEventListener('click', function() {
            var searchTerm = document.getElementById('search').value.toLowerCase();
            var foundPlace = places.find(function(place) {
                return place.name.toLowerCase() === searchTerm;
            });
            if (foundPlace) {
                map.setView([foundPlace.latitude, foundPlace.longitude], 14);
                openPopup(foundPlace);
            } else {
                alert('Place not found!');
            }
        });

        var searchInput = document.getElementById('search');
        var autocompleteList = document.getElementById('autocomplete-list');

        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value.toLowerCase();
            var matchingPlaces = places.filter(function(place) {
                return place.name.toLowerCase().includes(searchTerm);
            });

            autocompleteList.innerHTML = '';

            matchingPlaces.forEach(function(place) {
                var listItem = document.createElement('li');
                listItem.textContent = place.name;
                listItem.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-200');

                listItem.addEventListener('click', function() {
                    searchInput.value = place.name;
                    map.setView([place.latitude, place.longitude], 9);
                    openPopup(place);
                    autocompleteList.innerHTML = '';
                });

                autocompleteList.appendChild(listItem);
            });
        });

        document.addEventListener('click', function(event) {
            if (!searchInput.contains(event.target) && !autocompleteList.contains(event.target)) {
                autocompleteList.innerHTML = '';
            }
        });

        function openPopup(place) {
            document.getElementById('card-popup-img').src = '<?= base_url('uploads/') ?>/' + place.photo;
            document.getElementById('card-popup-name').textContent = place.name;
            document.getElementById('card-popup-location').textContent = place.location;
            document.getElementById('card-popup-link').href = '<?= site_url('place_detail/') ?>/' + place.id;
            document.getElementById('card-popup').classList.add('active');
        }

        function closePopup() {
            document.getElementById('card-popup').classList.remove('active');
        }
    </script>
</body>
</html>
