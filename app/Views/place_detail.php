<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Detail</title>
    <link rel="stylesheet" href="<?= base_url('frontend/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?= base_url('/') ?>">Home</a> /
        <span>Place Name</span>
    </div>

    <section id="place-detail" class="place-detail">
        <div class="place-info">
            <h2>Place Name</h2>
            <div class="place-image">
                <img src="https://via.placeholder.com/400x250" alt="Place Image">
            </div>
            <div class="place-details">
                <p><strong>Jenis:</strong> Wisata Alam</p>
                <p><strong>Koordinat Lokasi:</strong> -6.12345, 107.54321</p>
                <p><strong>Alamat:</strong> Jalan Contoh No. 123, Kota Contoh, Provinsi Contoh</p>
                <p><strong>Deskripsi:</strong></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </section>


    <?php include(APPPATH . 'Views/templates/footer.php'); ?>

    <!-- Script Javascript -->
    <script src="<?= base_url('js/script.js') ?>"></script>
</body>
</html>
