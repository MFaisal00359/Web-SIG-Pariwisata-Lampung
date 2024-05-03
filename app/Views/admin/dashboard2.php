<!-- dashboard.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/style_admin.css'); ?>">
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Dashboard Menu</h2>
            <ul>
                <li><a href="<?= base_url('admin/dashboard'); ?>" class="active">Dashboard</a></li>
                <li><a href="<?= base_url('admin/places'); ?>">Places</a></li>
                <li><a href="<?= base_url('admin/auth/logout'); ?>">Logout</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <div class="dashboard-header">
                <h2>Welcome to Admin Dashboard</h2>
                <p>You are now logged in as admin.</p>
            </div>
            <div class="dashboard-actions">
                <form action="<?= base_url('admin/places/upload'); ?>" method="POST" enctype="multipart/form-data">
                    <h3>Upload Place Details</h3>
                    <div class="form-group">
                        <label for="place_name">Place Name:</label>
                        <input type="text" id="place_name" name="place_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
