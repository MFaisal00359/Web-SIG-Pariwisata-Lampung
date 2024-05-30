<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style-admin.css') ?>">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/notie"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notie/dist/notie.min.css">
</head>
<body class="bg-gray-100 flex">
    <?php include(APPPATH . 'Views/templates/sidebar.php'); ?>
    <div class="flex-1 p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">TAMBAH TEMPAT WISATA</h2>
        <?php if (isset($validation)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"><?= $validation->listErrors() ?></div>
        <?php endif; ?>
        <form id="placeForm" action="<?= site_url('admin/savePlace') ?>" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md max-w-xl mx-auto">
            <?= csrf_field() ?>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 mb-2">Nama Wisata:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700 mb-2">Lokasi:</label>
                <input type="text" name="location" id="location" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 mb-2">Deskripsi:</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
            </div>
            <div class="mb-4">
                <label for="photo" class="block text-gray-700 mb-2">Foto:</label>
                <input type="file" name="photo" id="photo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                <img id="photoPreview" class="mt-4 hidden" src="#" alt="Preview Foto" class="w-24 h-64 object-cover rounded-xs">
            </div>
            <div class="mb-4">
                <label for="latitude" class="block text-gray-700 mb-2">Latitude:</label>
                <input type="text" name="latitude" id="latitude" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="longitude" class="block text-gray-700 mb-2">Longitude:</label>
                <input type="text" name="longitude" id="longitude" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 w-full">Simpan</button>
        </form>
    </div>
    <script>
        feather.replace();

        document.getElementById('photo').addEventListener('change', function(event) {
            const photoPreview = document.getElementById('photoPreview');
            const file = event.target.files[0];
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (file && allowedTypes.includes(file.type) && file.size <= 2 * 1024 * 1024) { // 2MB limit
                const reader = new FileReader();
                reader.onload = function(e) {
                    photoPreview.src = e.target.result;
                    photoPreview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                notie.alert({ type: 'error', text: 'Invalid file type or size. Please upload an image less than 2MB.' });
                event.target.value = '';
                photoPreview.classList.add('hidden');
            }
        });

        document.getElementById('placeForm').addEventListener('submit', function(event) {
            let valid = true;
            const requiredFields = ['name', 'location', 'description', 'latitude', 'longitude'];
            requiredFields.forEach(function(field) {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    valid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });
            if (!valid) {
                event.preventDefault();
                notie.alert({ type: 'warning', text: 'Harap isi semua bidang yang diperlukan.' });
            }
        });
    </script>
</body>
</html>
