<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tempat Wisata</title>
    <link rel="stylesheet" href="<?= base_url('css/style-form-place.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style-admin.css') ?>">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <?php include(APPPATH . 'Views/templates/sidebar.php'); ?>
    <div class="form-container">
        <h2>Edit Tempat Wisata</h2>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <form action="<?= site_url('admin/updatePlace/' . $place['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="name">Nama Wisata:</label>
                <input type="text" name="name" class="form-control" value="<?= $place['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Lokasi:</label>
                <input type="text" name="location" class="form-control" value="<?= $place['location'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" class="form-control" required><?= $place['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Foto:</label>
                <input type="file" name="photo" class="form-control">
                <img src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>" width="100">
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" class="form-control" value="<?= $place['latitude'] ?>" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" class="form-control" value="<?= $place['longitude'] ?>" required>
            </div>
            <input type="hidden" name="old_photo" value="<?= $place['photo'] ?>">
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
    <script>
        feather.replace();
    </script>
</body>
</html>
