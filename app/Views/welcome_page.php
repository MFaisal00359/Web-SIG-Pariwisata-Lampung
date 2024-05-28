<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoWisata Lampung</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/leaflet/leaflet.css') ?>">
    <link rel="icon" type="image/png" href="logo/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-sans">
    <?php include(APPPATH . 'Views/templates/header.php'); ?>

    <section id="explore" class="banner relative h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1642055910986-b2a600d336a6?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="banner-content absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white z-10">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">WELCOME TO GEOWISATA LAMPUNG</h1>
            <p class="text-lg mb-8">Discover the beauty of Lampung's geological wonders</p>
            <a href="<?= site_url('explore_place'); ?>" class="btn bg-yellow-500 text-white py-2 px-4 rounded-full hover:bg-yellow-600">Explore Now</a>
        </div>
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
    </section>

    <section id="about-lampung" class="about-lampung py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center">About Lampung</h2>
            <div class="content flex flex-col md:flex-row items-center">
                <div class="description flex-1 p-4">
                    <p class="text-lg leading-relaxed text-gray-700">Lampung is a province in Sumatra, Indonesia, known for its diverse natural landscapes and rich cultural heritage. Situated on the southern tip of Sumatra, Lampung offers stunning beaches, lush tropical forests, and captivating volcanic landscapes. The province is also home to vibrant traditional ceremonies, delicious culinary delights, and warm hospitality.</p>
                </div>
                <div class="image flex-1 p-4">
                    <img class="rounded-lg shadow-lg" src="https://images.unsplash.com/photo-1587793433184-9b9a1191802c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Lampung">
                </div>
            </div>
        </div>
    </section>

    <section id="tourist-places" class="tourist-places py-20 bg-blue-50">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">List Place</h2>
            <?php if (empty($places)): ?>
                <div class="no-places">
                    <img src="<?= base_url('images/nothing_places.png') ?>" alt="No Places" class="mx-auto mb-4">
                    <p>No places found.</p>
                </div>
            <?php else: ?>
                <div class="place-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    <?php foreach ($places as $place) : ?>
                        <div class="place-card bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                            <img src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>" class="w-full h-48 object-cover">
                            <div class="place-card-content p-4 text-center">
                                <h3 class="text-xl font-semibold mb-2"><?= $place['name'] ?></h3>
                                <a href="<?= site_url('place_detail/' . $place['id']) ?>" class="btn bg-yellow-500 text-white py-2 px-4 rounded-full hover:bg-yellow-600">Detail</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="pagination mt-8 flex justify-center">
                    <a href="#" class="bg-yellow-500 text-white py-2 px-4 rounded-full hover:bg-yellow-600">Tempat lainnya</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section id="maps" class="maps py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">Maps</h2>
            <div id="map" class="map h-96 w-full"></div>
        </div>
    </section>

    <section id="sdgs-info" class="sdgs-info py-20 bg-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">Sistem Informasi Geografis Pariwisata dan SDGs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-4 bg-gray-100 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">SDG 8: Decent Work and Economic Growth</h3>
                    <p class="text-lg text-gray-700">Sistem informasi geografis pariwisata membantu menciptakan peluang kerja dan meningkatkan pertumbuhan ekonomi lokal melalui promosi destinasi wisata dan penyediaan informasi yang akurat kepada wisatawan.</p>
                </div>
                <div class="p-4 bg-gray-100 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">SDG 14: Life Below Water</h3>
                    <p class="text-lg text-gray-700">Melalui pemetaan dan pengelolaan destinasi wisata pantai dan laut, kita dapat menjaga kelestarian ekosistem bawah laut dan mendukung keberlanjutan sumber daya laut.</p>
                </div>
                <div class="p-4 bg-gray-100 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">SDG 15: Life on Land</h3>
                    <p class="text-lg text-gray-700">Dengan informasi geografis yang tepat, pengelolaan hutan dan kawasan alam dapat ditingkatkan untuk melindungi keanekaragaman hayati dan mendukung kehidupan darat yang berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p class="text-sm">Made with <span class="text-orange-500">🧡</span> by Kelompok 6 SIG</p>
            <p class="text-sm mt-2">
                <a href="https://itera.ac.id" class="text-orange-500 hover:underline">Website ITERA</a> |
                <a href="https://www.instagram.com/iteraofficial/" class="text-orange-500 hover:underline">Instagram ITERA</a>
            </p>
        </div>
    </footer>

    

    <script src="<?= base_url('vendor/leaflet/leaflet.js') ?>"></script>    
    <script src="<?= base_url('js/MapsPrewiewLanding.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        // Initialize ScrollReveal
        ScrollReveal().reveal('.banner-content, .about-lampung, .tourist-places, .maps, .sdgs-info, footer', {
            duration: 1000,
            origin: 'bottom',
            distance: '50px',
            delay: 200
        });

        // Initialize Leaflet map
        var map = L.map('map').setView([-5.45, 105.266], 8); // Coordinates for Lampung province

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>
</body>
</html>
