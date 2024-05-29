<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style-login.css') ?>">
    <style>
        .eye {
            color: black;
            z-index: 1000;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="login-container bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6">Login</h2>
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger text-red-500 mb-4"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="<?= site_url('admin/loginAuth') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email:</label>
                <input type="email" name="email" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="form-group mb-4 relative">
                <label for="password" class="block text-gray-700 mb-2">Password:</label>
                <input type="password" name="password" id="password" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500" required>
                <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 px-4 py-2 text-black z-100">
                    <i data-feather="eye"></i>
                </button>
            </div>
            <button type="submit" class="btn bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 w-full">Login</button>
        </form>
        <a href="<?= site_url('/') ?>" class="block mt-4 text-center text-blue-500 hover:underline">Kembali ke Halaman Utama</a>
    </div>

    <script>
        feather.replace();
        
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.querySelector('button[onclick="togglePasswordVisibility()"] i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.setAttribute('data-feather', 'eye-off');
            } else {
                passwordInput.type = 'password';
                passwordToggle.setAttribute('data-feather', 'eye');
            }
            feather.replace();
        }
    </script>
</body>
</html>
