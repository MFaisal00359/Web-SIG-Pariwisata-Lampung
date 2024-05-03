// Fungsi untuk menangani perubahan pada navigasi saat digulir
function handleScroll() {
    var header = document.getElementById('navbar');
    var scrollPosition = window.scrollY;

    if (scrollPosition > 0) {
        header.classList.add('scroll');
        document.body.style.paddingTop = header.offsetHeight + 'px';
    } else {
        header.classList.remove('scroll');
        document.body.style.paddingTop = 0;
    }
}

// Panggil fungsi handleScroll saat jendela di-scroll, dimuat, dan diubah ukurannya
window.addEventListener('scroll', handleScroll);
window.addEventListener('load', handleScroll);
window.addEventListener('resize', handleScroll);
