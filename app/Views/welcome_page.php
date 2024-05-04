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
</head>
<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>

    <section id="explore" class="banner">
        <div class="banner-content">
            <h1>WELCOME TO GEOWISATA LAMPUNG</h1>
            <p>Discover the beauty of Lampung's geological wonders</p>
            <a href="<?= site_url('explore_place'); ?>" class="btn">Explore Now</a>
        </div>
    </section>


    <section id="about-lampung" class="about-lampung">
        <h2>About Lampung</h2>
        <div class="content">
            <div class="description">
                <p>Lampung is a province in Sumatra, Indonesia, known for its diverse natural landscapes and rich cultural heritage. Situated on the southern tip of Sumatra, Lampung offers stunning beaches, lush tropical forests, and captivating volcanic landscapes. The province is also home to vibrant traditional ceremonies, delicious culinary delights, and warm hospitality.</p>
            </div>
            <div class="image">
                <img src="https://images.unsplash.com/photo-1587793433184-9b9a1191802c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Lampung">
            </div>
        </div>
    </section>

    <section id="tourist-places" class="tourist-places">
        <h2>List Place</h2>
            <div class="place-container">
                <a href="<?= site_url('place_detail'); ?>" class="place-card">
                    <img src="https://via.placeholder.com/300" alt="Tourist Place 1">
                    <h3>Tourist Place 1</h3>
                    <p>Description of Tourist Place 1</p>
                </a>
                <a href="<?= site_url('place_detail'); ?>" class="place-card">
                    <img src="https://via.placeholder.com/300" alt="Tourist Place 2">
                    <h3>Tourist Place 2</h3>
                    <p>Description of Tourist Place 2</p>
                </a>
                <a href="<?= site_url('place_detail'); ?>" class="place-card">
                    <img src="https://via.placeholder.com/300" alt="Tourist Place 3">
                    <h3>Tourist Place 3</h3>
                    <p>Description of Tourist Place 3</p>
                </a>
                <a href="<?= site_url('place_detail'); ?>" class="place-card">
                    <img src="https://via.placeholder.com/300" alt="Tourist Place 4">
                    <h3>Tourist Place 4</h3>
                    <p>Description of Tourist Place 4</p>
                </a>
                <a href="<?= site_url('place_detail'); ?>" class="place-card">
                    <img src="https://via.placeholder.com/300" alt="Tourist Place 5">
                    <h3>Tourist Place 5</h3>
                    <p>Description of Tourist Place 5</p>
                </a>
                <a href="<?= site_url('place_detail'); ?>" class="place-card">
                    <img src="https://via.placeholder.com/300" alt="Tourist Place 6">
                    <h3>Tourist Place 6</h3>
                    <p>Description of Tourist Place 6</p>
                </a>
            </div>
    </section>

    <section id="maps" class="maps">
        <h2>Maps</h2>
        <div id="map" class="map"></div>
    </section>

    <?php include(APPPATH . 'Views/templates/footer.php'); ?>

    <script src="<?= base_url('vendor/leaflet/leaflet.js') ?>"></script>    
    <script src="<?= base_url('js/MapsPrewiewLanding.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>

</body>
</html>
