<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style-form-place.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style-admin.css') ?>">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 flex">
    <?php include(APPPATH . 'Views/templates/sidebar.php'); ?>
    <div class="form-container flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6">Tambah Tempat Wisata</h2>
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger text-red-500 mb-4"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <form action="<?= site_url('admin/savePlace') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group mb-4">
                <label for="name" class="block text-gray-700 mb-2">Nama Wisata:</label>
                <input type="text" name="name" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="form-group mb-4">
                <label for="location" class="block text-gray-700 mb-2">Lokasi:</label>
                <input type="text" name="location" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="form-group mb-4">
                <label for="description" class="block text-gray-700 mb-2">Deskripsi:</label>
                <textarea name="description" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="photo" class="block text-gray-700 mb-2">Foto:</label>
                <div class="relative flex items-center">
                    <input type="file" name="photo" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="latitude" class="block text-gray-700 mb-2">Latitude:</label>
                <input type="text" name="latitude" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="form-group mb-4">
                <label for="longitude" class="block text-gray-700 mb-2">Longitude:</label>
                <input type="text" name="longitude" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="btn bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Simpan</button>
        </form>
    </div>
    <script> 
        feather.replace();
    </script>
</body>
</html>
