<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/style-dashboard.css') ?>">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?= session()->get('username') ?></h1>
        <div class="logout-link">
            <a href="<?= site_url('admin/logout') ?>">Logout</a>
        </div>
        <h2>Tempat Wisata</h2>
        <a href="<?= site_url('admin/addPlace') ?>" class="btn">Tambah Tempat Wisata</a>
        <table>
            <tr>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Koordinat</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($places as $place) : ?>
                <tr>
                    <td><?= $place['name'] ?></td>
                    <td><?= $place['location'] ?></td>
                    <td><?= $place['description'] ?></td>
                    <td><img src="<?= base_url('uploads/' . $place['photo']) ?>" alt="<?= $place['name'] ?>" width="100"></td>
                    <td><?= $place['latitude'] ?>, <?= $place['longitude'] ?></td>
                    <td>
                        <a href="<?= site_url('admin/editPlace/' . $place['id']) ?>">Edit</a>
                        <a href="<?= site_url('admin/deletePlace/' . $place['id']) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
