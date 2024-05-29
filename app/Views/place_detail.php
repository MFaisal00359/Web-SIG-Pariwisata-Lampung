<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $place['name'] ?> - Place Detail</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
    <link rel="stylesheet" href="<?= base_url('leaflet/leaflet.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <?php include(APPPATH . 'Views/templates/navbar.php'); ?>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="py-3 px-5 mb-5">
            <a href="<?= base_url('/') ?>" class="text-blue-500 hover:underline">Home</a> /
            <span class="text-gray-700"><?= $place['name'] ?></span>
        </div>

        <section id="place-detail" class="place-detail">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h2 class="text-3xl font-bold mb-8 text-left mt-4 bg-gray-100 text-gray-500 p-12 rounded-lg"><?= $place['name'] ?></h2>
                    <div class="place-image mb-6">
                        <img class="w-full rounded-lg shadow-lg" src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>">
                    </div>
                    <hr class="my-12" />
                    <div class="place-details space-y-4">
                        <p class="mb-2 text-lg"><strong class="font-semibold">Lokasi:</strong> <?= $place['location'] ?></p>
                        <p class="mb-2 text-lg"><strong class="font-semibold">Koordinat:</strong> <?= $place['latitude'] ?>, <?= $place['longitude'] ?></p>
                        <p class="mb-4 text-lg"><strong class="font-semibold">Deskripsi:</strong></p>
                        <p class="text-gray-700 mb-4"><?= $place['description'] ?></p>
                        <div id="map" class="w-full h-64 rounded-lg shadow-md"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include(APPPATH . 'Views/templates/footer.php'); ?>

    <script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
    <script>
        // Initialize Leaflet map
        var map = L.map('map').setView([<?= $place['latitude'] ?>, <?= $place['longitude'] ?>], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([<?= $place['latitude'] ?>, <?= $place['longitude'] ?>]).addTo(map)
            .bindPopup('<b><?= $place['name'] ?></b><br><?= $place['location'] ?>').openPopup();
    </script>
</body>
</html>
