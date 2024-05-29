<div class="sidebar bg-gray-800 text-white w-64 min-h-screen flex flex-col items-center py-8">
    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Lampung_coa.png" alt="Logo-Lampung" class="logo w-24 mb-8">
    <a class="icons flex items-center mb-4 text-white hover:text-yellow-500" href="<?= site_url('admin/dashboard') ?>">
        <i data-feather="home" class="mr-2"></i>
        <span>Dashboard</span>
    </a>
    <hr />
    <a class="icons flex items-center mb-4 text-white hover:text-yellow-500" href="<?= site_url('admin/addPlace') ?>">
        <i data-feather="plus-circle" class="mr-2"></i>
        <span>Tempat Wisata</span>
    </a>
    <div class="logout-link icons flex items-center mt-auto text-white hover:text-yellow-500">
        <a class="flex items-center w-full justify-center" href="<?= site_url('admin/logout') ?>">
            <i data-feather="log-out" class="mr-2"></i>
            <span>Logout</span>
        </a>
    </div>
</div>

<script>
    feather.replace();
</script>
