<header>
    <nav id="navbar" class="absolute w-full bg-transparent text-white">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <div class="logo-container flex items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Lampung_coa.png" alt="Logo-Lampung" class="logo w-9">
                <h1 class="ml-3 text-xl font-bold"><span>GIS</span> Wisata<br />Lampung</h1>
            </div>
            
            <div class="md:hidden">
                <button id="navbar-toggle" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            
            <ul id="navbar-menu" class="hidden md:flex space-x-4 text-center align-middle">
                <li class="p-1 rounded-full"><a href="<?= base_url('/') ?>" class="hover:text-yellow-400 ">Home</a></li>
                <li class="p-1 rounded-full"><a href="<?= base_url('#about-lampung') ?>" class="hover:text-yellow-400 ">Lampung</a></li>
                <li class="p-1 rounded-full"><a href="<?= base_url('#tourist-places') ?>" class="hover:text-yellow-400 ">Places</a></li>
                <li class="p-1 rounded-full"><a href="<?= site_url('explore_place'); ?>" class="hover:text-yellow-400 ">Maps</a></li>
                <!-- <li class="hover:bg-yellow-400 p-1 rounded-full"><a href="<?= base_url('admin') ?>" class="hover:text-black">Admin Login</a></li> -->
            </ul>
        </div>
        
        <div id="navbar-menu-mobile" class="hidden md:hidden bg-gray-800 text-white flex flex-col items-center space-y-2 mt-4 p-4 rounded-lg shadow-lg">
            <a href="<?= base_url('/') ?>" class="block py-2 px-4 w-full text-center hover:bg-gray-700 rounded">Home</a>
            <a href="<?= base_url('#about-lampung') ?>" class="block py-2 px-4 w-full text-center hover:bg-gray-700 rounded">Lampung</a>
            <a href="<?= base_url('#tourist-places') ?>" class="block py-2 px-4 w-full text-center hover:bg-gray-700 rounded">Places</a>
            <a href="<?= site_url('explore_place'); ?>" class="block py-2 px-4 w-full text-center hover:bg-gray-700 rounded">Maps</a>
            <!-- <a href="<?= base_url('admin') ?>" class="block py-2 px-4 w-full text-center hover:bg-gray-700 rounded">Admin Login</a> -->
        </div>
    </nav>
</header>

<script>
    document.getElementById('navbar-toggle').addEventListener('click', function() {
        const menu = document.getElementById('navbar-menu-mobile');
        menu.classList.toggle('hidden');
    });
</script>
