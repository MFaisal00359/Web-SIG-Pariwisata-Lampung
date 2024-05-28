<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $place['name'] ?> - Place Detail</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/nav.css') ?>">
</head>
<body>
    <?php include(APPPATH . 'Views/templates/header.php'); ?>

    <div class="breadcrumb">
        <a href="<?= base_url('/') ?>">Home</a> /
        <span><?= $place['name'] ?></span>
    </div>

    <section id="place-detail" class="place-detail">
        <div class="place-info">
            <h2><?= $place['name'] ?></h2>
            <div class="place-image">
                <img src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>">
            </div>
            <div class="place-details">
                <p><strong>Lokasi:</strong> <?= $place['location'] ?></p>
                <p><strong>Koordinat:</strong> <?= $place['latitude'] ?>, <?= $place['longitude'] ?></p>
                <p><strong>Deskripsi:</strong></p>
                <p><?= $place['description'] ?></p>
            </div>
        </div>
    </section>

    <?php include(APPPATH . 'Views/templates/footer.php'); ?>

    <script src="<?= base_url('js/script.js') ?>"></script>
</body>
</html>
