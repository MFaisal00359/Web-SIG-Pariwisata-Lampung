<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style_login.css'); ?>">
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="error-message"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= route_to('admin.authenticate') ?>" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <a href="<?= base_url('/') ?>" class="back-btn">Back to Home</a>
    </div>
</body>

</html>
