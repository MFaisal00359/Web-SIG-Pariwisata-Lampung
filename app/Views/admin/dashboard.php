    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('css/style-admin.css') ?>">
        <script src="https://unpkg.com/feather-icons"></script>
    </head>
    <body class="bg-gray-100">
        <?php include(APPPATH . 'Views/templates/sidebar.php'); ?>
        <div class="dashboard-container p-6">
            <h1 class="text-3xl font-bold mb-6">Welcome, <?= session()->get('username') ?></h1>
            <h2 class="text-2xl font-semibold mb-4">Tempat Wisata</h2>
            <?php if (empty($places)): ?>
                <div class="no-places text-center">
                    <img src="<?= base_url('images/bg-not-found.png') ?>" alt="No Places" class="mx-auto mb-4">
                    <p class="text-gray-600">No places now</p>
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow-md">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-4">Nama</th>
                                <th class="py-2 px-4">Lokasi</th>
                                <th class="py-2 px-4">Deskripsi</th>
                                <th class="py-2 px-4">Foto</th>
                                <th class="py-2 px-4">Koordinat</th>
                                <th class="py-2 px-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($places as $place) : ?>
                                <tr class="border-b">
                                    <td class="py-2 px-4"><?= $place['name'] ?></td>
                                    <td class="py-2 px-4"><?= $place['location'] ?></td>
                                    <td class="py-2 px-4"><?= $place['description'] ?></td>
                                    <td class="py-2 px-4"><img src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>" width="100"></td>
                                    <td class="py-2 px-4"><?= $place['latitude'] ?>, <?= $place['longitude'] ?></td>
                                    <td class="py-2 flex flex-col border-none">
                                        <a href="<?= site_url('admin/editPlace/' . $place['id']) ?>" class="text-white text-center bg-blue-500 hover:bg-blue-600 p-3 rounded-full m-2 hover:underline">Edit</a>
                                        <a href="<?= site_url('admin/deletePlace/' . $place['id']) ?>" class="text-white text-center bg-red-500 hover:bg-red-600 p-3 rounded-full m-2 hover:underline">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        <script>
            feather.replace();
        </script>
    </body>
    </html>
