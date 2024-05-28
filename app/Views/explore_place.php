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
            width: 300px;
            z-index: 1000;
            background-color: rgba(255, 255, 255);
            border-radius: 500px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        #search-container input[type="text"] {
            flex-grow: 1;
            border: none;
            outline: none;
            padding: 8px;
            border-radius: 20px;
            margin-right: 10px;
        }
        #search-container button {
            background-color: #ff9900;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            top: 100%;
            left: 0;
            right: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }
        .autocomplete-list li {
            padding: 10px;
            cursor: pointer;
        }
        .autocomplete-list li:hover {
            background-color: #f0f0f0;
        }
        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #3490dc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 1000;
        }
        .back-button:hover {
            background-color: #2779bd;
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

    <button onclick="window.location.href='<?= site_url('/'); ?>'" class="back-button">Back to Welcome Page</button>

    <script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
    <script>
        var map = L.map('map').setView([-4.9180, 105.1997], 8); // zoom 8

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Informasi marker
        var places = <?= json_encode($places) ?>;

        places.forEach(function(place) {
            L.marker([place.latitude, place.longitude]).addTo(map).bindPopup(`<b>${place.name}</b><br>${place.location}<br>${place.description}`);
        });

        document.getElementById('search-button').addEventListener('click', function() {
            var searchTerm = document.getElementById('search').value.toLowerCase();
            var foundPlace = places.find(function(place) {
                return place.name.toLowerCase() === searchTerm;
            });
            if (foundPlace) {
                map.setView([foundPlace.latitude, foundPlace.longitude], 14);
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
                    map.setView([place.latitude, place.longitude], 14);
                    autocompleteList.innerHTML = '';
                });

                autocompleteList.appendChild(listItem);
            });
        });

        // Hide autocomplete list when clicking outside
        document.addEventListener('click', function(event) {
            if (!searchInput.contains(event.target) && !autocompleteList.contains(event.target)) {
                autocompleteList.innerHTML = '';
            }
        });
    </script>
</body>
</html>
