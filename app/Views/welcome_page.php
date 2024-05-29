<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIS Wisata Lampung</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
    <link rel="stylesheet" href="<?= base_url('leaflet/leaflet.css') ?>">
    <link rel="icon" type="image/png" href="logo/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-sans">
    <?php include(APPPATH . 'Views/templates/navbar.php'); ?>

    <section id="explore" class="banner relative h-screen bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1716668595976-604426108db1?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="banner-content absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white z-10">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">WELCOME TO GIS WISATA LAMPUNG</h1>
            <p class="text-lg mb-8">Discover the beauty of Lampung's Place's tourist wonders</p>
            <a href="<?= site_url('explore_place'); ?>" class="btn bg-yellow-500 text-white py-3 px-6 text-xl rounded-full hover:bg-yellow-600 transition duration-300 ease-in-out">Explore Now</a>
        </div>
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
    </section>

    <section id="about-lampung" class="about-lampung py-40 bg-gray-100">
        <div class="about-lampung-content max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">Tentang Lampung</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="description">
                    <p class="text-lg leading-relaxed text-gray-700">
                        Lampung adalah sebuah provinsi di Sumatra, Indonesia, yang dikenal dengan keanekaragaman
                        lanskap alamnya dan warisan budaya yang kaya. Terletak di ujung selatan Sumatra, Lampung
                        menawarkan pantai yang menakjubkan, hutan tropis yang rimbun, dan pemandangan vulkanik yang memukau.
                        Provinsi ini juga terkenal dengan upacara tradisional yang meriah, kuliner lezat, dan keramahan yang hangat.
                    </p>
                </div>
                <div class="image">
                    <img class="rounded-lg shadow-lg" src="https://images.unsplash.com/photo-1573722740800-cbf53257dde7?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Lampung">
                </div>
            </div>
        </div>
    </section>

    <section id="tourist-places" class="tourist-places py-40 bg-gray-200">
        <div class="tourist-places-cards max-w-6xl mx-auto text-center sm:px-6 lg:px-8 py-100 rounded-lg">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-black">OBJEK WISATA</h2>
            <?php if (empty($places)): ?>
                <div class="no-places">
                    <img src="<?= base_url('images/bg-not-found.png') ?>" alt="No Places" class="mx-auto mb-4">
                    <p class="text-black">No places found.</p>
                </div>
            <?php else: ?>
                <div class="place-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 justify-items-center">
                    <?php foreach ($places as $place) : ?>
                        <div class="place-card relative bg-white bg-opacity-90 rounded-lg overflow-hidden transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                            <div class="place-card-content absolute inset-0 bg-black bg-opacity-50 text-white p-6 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <h3 class="text-xl font-semibold mb-4"><?= $place['name'] ?></h3>
                                <a href="<?= site_url('place_detail/' . $place['id']) ?>" class="btn bg-yellow-500 text-white py-2 px-4 rounded-full hover:bg-yellow-600 transition duration-300 ease-in-out">Place Details</a>
                            </div>
                            <img src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>" class="w-full h-80 object-cover">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="pagination mt-8 flex justify-center">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section id="sdgs-info" class="sdgs-info py-20" style="background-image: url('https://images.unsplash.com/photo-1542281286-9e0a16bb7366?q=80&w=1080&fm=jpg&crop=entropy&cs=tinysrgb'); background-size: cover; background-position: center;">
        <div id="sdgs-cards" class="sdgs-cards max-w-6xl mx-auto text-center px-4 sm:px-6 lg:px-8 bg-black bg-opacity-50 py-20 rounded-lg">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-white">Sistem Informasi Geografis Pariwisata dan SDGs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                <div class="p-4 bg-gray-900 bg-opacity-75 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">SDG 8: Decent Work and Economic Growth</h3>
                    <p class="text-lg">Sistem informasi geografis pariwisata membantu menciptakan peluang kerja dan meningkatkan pertumbuhan ekonomi lokal melalui promosi destinasi wisata dan penyediaan informasi yang akurat kepada wisatawan.</p>
                </div>
                <div class="p-4 bg-gray-900 bg-opacity-75 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">SDG 14: Life Below Water</h3>
                    <p class="text-lg">Melalui pemetaan dan pengelolaan destinasi wisata pantai dan laut, kita dapat menjaga kelestarian ekosistem bawah laut dan mendukung keberlanjutan sumber daya laut.</p>
                </div>
                <div class="p-4 bg-gray-900 bg-opacity-75 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">SDG 15: Life on Land</h3>
                    <p class="text-lg">Dengan informasi geografis yang tepat, pengelolaan hutan dan kawasan alam dapat ditingkatkan untuk melindungi keanekaragaman hayati dan mendukung kehidupan darat yang berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="maps" class="maps py-40 bg-gray-100">
        <div class="max-w-3xl mx-auto text-center px-12 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-16">Maps</h2>
            <div id="map" class="map h-80 w-full rounded-lg shadow-md"></div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center">
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-bold">GIS Wisata Lampung</h3>
                    <p class="text-sm mt-2">Menjelajahi keindahan wisata Lampung</p>
                </div>
                <div class="mt-4 md:mt-0 text-center">
                    <p class="text-sm">Made with <span class="text-orange-500">🧡</span> by Kelompok 6 SIG</p>
                </div>
                <div class="mt-4 md:mt-0 text-center">
                    <a href="https://itera.ac.id" class="text-orange-500 hover:underline mx-2">Website ITERA</a>
                    <a href="https://www.instagram.com/iteraofficial/" class="text-orange-500 hover:underline mx-2">Instagram ITERA</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('leaflet/leaflet.js') ?>"></script>    
    <script src="<?= base_url('js/MapsPrewiewLanding.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        // ScrollReveal
        ScrollReveal().reveal('.banner-content, .about-lampung-content, .tourist-places-cards, .map, .sdgs-cards', {
            duration: 1000,
            origin: 'bottom',
            distance: '50px',
            delay: 200
        });

        // Leaflet map
        var map = L.map('map').setView([-4.9180, 105.1997], 8); // zoom 8

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Informasi marker
        var places = <?= json_encode($places) ?>;

        places.forEach(function(place) {
            var marker = L.marker([place.latitude, place.longitude]).addTo(map).bindPopup(`<b>${place.name}</b><br>${place.location}<br>${place.description}`);
            
            marker.on('click', function() {
                openPopup(place);
            });
        });
    </script>
</body>
</html>
