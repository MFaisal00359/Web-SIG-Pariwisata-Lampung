<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Place</title>
    <link rel="stylesheet" href="<?= base_url('vendor/leaflet/leaflet.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('logo/favicon.png') ?>">
    <style>
        /* Style khusus explore_place */
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
            top: 95px;
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
    </style>
</head>
<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?> 

    <div id="search-container">
        <input type="text" id="search" placeholder="Search for places">
        <button id="search-button">Search</button>
    </div>

    <div id="map"></div>

    <!-- <div class="legend">
        <h4>Legend</h4>
        <p>Place 1: <span style="color: blue;">Blue Marker</span></p>
        <p>Place 2: <span style="color: red;">Red Marker</span></p>
    </div> -->

    <script src="<?= base_url('vendor/leaflet/leaflet.js') ?>"></script>
    <script>
        var map = L.map('map').setView([-4.9180, 105.1997], 8); // zoom 8

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Informasi marker
        var places = [
            {
                coordinates: [-5.429, 105.262],
                name: "Bandar Lampung",
                location: "Lampung, Indonesia",
                description: "Bandar Lampung is the capital and largest city of the Indonesian province of Lampung. Located on the southern tip of Sumatra, Bandar Lampung was originally called Tanjungkarang–Telukbetung, since it was a unification of two major settlements in Lampung, before being renamed in 1983."
            },
            {
                coordinates: [-5.3684, 105.258],
                name: "Tugu Kiluan",
                location: "Lampung, Indonesia",
                description: "Tugu Kiluan is a monument located in Lampung, Indonesia. It is a popular landmark in the region and offers scenic views of the surrounding area."
            },
            {
                coordinates: [-5.1564, 105.4789],
                name: "Pahawang Island",
                location: "Lampung, Indonesia",
                description: "Pahawang Island is a small island located in the Lampung Province of Indonesia. It is known for its beautiful beaches, clear waters, and rich marine biodiversity, making it a popular destination for snorkeling and diving."
            },
            {
                coordinates: [-4.927394078904447, 105.77697121016783],
                name: "Way Kambas National Park",
                location: "Lampung, Indonesia",
                description: "Way Kambas National Park is a protected area located in Lampung, Indonesia. It is known for its diverse wildlife, including critically endangered species such as the Sumatran elephant and Sumatran rhinoceros."
            },
            {
                coordinates: [-5.243988992526334, 104.08543567647995],
                name: "Pesisir Selatan",
                location: "Lampung, Indonesia",
                description: "Pesisir Selatan is a regency located in Lampung, Indonesia. It is known for its beautiful coastline, sandy beaches, and vibrant local culture."
            },
            {
                coordinates: [-5.372073395374574, 105.24094509066006],
                name: "Museum Lampung",
                location: "Lampung, Indonesia",
                description: "Museum Lampung is a museum located in Bandar Lampung, Lampung, Indonesia. It showcases various artifacts and exhibits related to the history, culture, and heritage of the Lampung Province."
            },
            {
                coordinates: [-5.514287010817543, 105.26426357634887],
                name: "Pantai Mutun",
                location: "Lampung, Indonesia",
                description: "Pantai Mutun is a popular beach destination located in Lampung, Indonesia. It is known for its golden sands, clear waters, and stunning sunset views."
            },
            {
                coordinates: [-5.302421538533294, 103.99997867051013],
                name: "Pantai Tanjung Setia",
                location: "Lampung, Indonesia",
                description: "Pantai Tanjung Setia is a picturesque beach located in Lampung, Indonesia. It is famous for its excellent surfing conditions, attracting surfers from around the world."
            },
            {
                coordinates: [-5.621560976671441, 105.22291492550869],
                name: "Pulau Kelagian",
                location: "Lampung, Indonesia",
                description: "Pulau Kelagian is a small island located off the coast of Lampung, Indonesia. It is known for its pristine beaches, coral reefs, and abundant marine life, making it a popular destination for snorkeling and diving."
            },
            {
                coordinates: [-5.4117800123140105, 105.26312589668271],
                name: "Bukit Randu",
                location: "Lampung, Indonesia",
                description: "Bukit Randu is a hill located in Lampung, Indonesia. It offers panoramic views of the surrounding area and is a popular spot for hiking and outdoor activities."
            },
            {
                coordinates: [-5.407859975267771, 105.25760046748503],
                name: "Taman Kota",
                location: "Lampung, Indonesia",
                description: "Taman Kota is a public park located in Bandar Lampung, Lampung, Indonesia. It is a popular recreational area for locals and visitors alike, offering green spaces, walking paths, and playgrounds."
            },
            {
                coordinates: [-5.463205186028447, 105.26547198537499],
                name: "Pulau Pasaran",
                location: "Lampung, Indonesia",
                description: "Pulau Pasaran is an island located in Lampung, Indonesia. It is known for its pristine beaches, crystal-clear waters, and vibrant marine life, making it a popular destination for beachgoers and snorkelers."
            },
            {
                coordinates: [-5.769970814961522, 105.106462359927],
                name: "Pantai Kiluan",
                location: "Lampung, Indonesia",
                description: "Pantai Kiluan is a picturesque beach located in Lampung, Indonesia. It is known for its tranquil atmosphere, turquoise waters, and stunning coastal scenery, making it a popular destination for relaxation and sightseeing."
            },
            {
                coordinates: [-4.922777279380305, 104.1460251857796],
                name: "Gunung Pesagi",
                location: "Lampung, Indonesia",
                description: "Gunung Pesagi is a mountain located in Lampung, Indonesia. It is known for its scenic hiking trails, lush forests, and panoramic views of the surrounding landscape."
            },
            {
                coordinates: [-5.781496157721336, 105.62609070871672],
                name: "Gunung Rajabasa",
                location: "Lampung, Indonesia",
                description: "Gunung Rajabasa is an active volcano located in Lampung, Indonesia. It is a popular destination for hiking and trekking enthusiasts, offering challenging trails and breathtaking views from the summit."
            },
            {
                coordinates: [-5.428098441127239, 105.15395203984555],
                name: "Gunung Betung",
                location: "Lampung, Indonesia",
                description: "Gunung Betung is a stratovolcano located in Lampung, Indonesia. It is one of the most prominent peaks in the region and offers stunning views of the surrounding landscape from its summit."
            },
            {
                coordinates: [-4.85987594115948, 104.38610078133071],
                name: "Air Terjun Putri Malu",
                location: "Lampung, Indonesia",
                description: "Air Terjun Putri Malu is a waterfall located in Lampung, Indonesia. It is known for its natural beauty, serene atmosphere, and refreshing swimming holes, making it a popular destination for nature lovers and adventurers."
            },
            {
                coordinates: [-4.691655050735655, 105.17918130611987],
                name: "Gunung Batin",
                location: "Lampung, Indonesia",
                description: "Gunung Batin is a volcanic mountain located in Lampung, Indonesia. It is known for its rugged terrain, lush vegetation, and stunning panoramic views from the summit."
            },
            {
                coordinates: [-5.4197, 105.2082],
                name: "Curup Panggang",
                location: "Lampung, Indonesia",
                description: "Curup Panggang is a scenic hill located in Lampung, Indonesia. It is a popular destination for hiking, picnicking, and enjoying panoramic views of the surrounding landscape."
            },
            {
                coordinates: [-5.3735, 104.6214],
                name: "Curug Lawe",
                location: "Lampung, Indonesia",
                description: "Curug Lawe is a beautiful waterfall located in Lampung, Indonesia. It is known for its pristine natural surroundings, refreshing cascades, and tranquil atmosphere, making it a popular destination for nature enthusiasts and adventurers."
            },
            {
                coordinates: [-5.4266, 104.5834],
                name: "Taman Wisata Selendang Mayang",
                location: "Lampung, Indonesia",
                description: "Taman Wisata Selendang Mayang is a recreational park located in Lampung, Indonesia. It offers a range of attractions and activities for visitors, including walking trails, gardens, and cultural performances."
            }
        ];

        places.forEach(function(place) {
            L.marker(place.coordinates).addTo(map).bindPopup(`<b>${place.name}</b><br>${place.location}<br>${place.description}`);
        });

        document.getElementById('search-button').addEventListener('click', function() {
            var searchTerm = document.getElementById('search').value.toLowerCase();
            var foundPlace = places.find(function(place) {
                return place.name.toLowerCase() === searchTerm;
            });
            if (foundPlace) {
                map.setView(foundPlace.coordinates, 14);
            } else {
                alert('Place not found!');
            }
        });

        var searchInput = document.getElementById('search');
        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value.toLowerCase();
            var matchingPlaces = places.filter(function(place) {
                return place.name.toLowerCase().includes(searchTerm);
            });
            var autocompleteList = document.getElementById('autocomplete-list');
            autocompleteList.innerHTML = '';
            matchingPlaces.forEach(function(place) {
                var listItem = document.createElement('li');
                listItem.textContent = place.name;
                listItem.addEventListener('click', function() {
                    searchInput.value = place.name;
                    map.setView(place.coordinates, 14);
                    autocompleteList.innerHTML = '';
                });
                autocompleteList.appendChild(listItem);
            });
        });
    </script>
</body>
</html>
