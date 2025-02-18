<div class="background-image-other">
    <!-- Overlay untuk menutup sidebar ketika area luar sidebar diklik -->
    <div class="overlay"></div>
    <div class="container pt-4">
        <nav class="navbar navbar-expand-lg pe-4 nav-other">
            <h1><a class="navbar-brand tasty-food" href="{{ url('/') }}">TASTY FOOD</a></h1>
            <button class="navbar-toggler" type="button">
                <span class="toggler-icon">&#9776;</span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">TENTANG</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">GALERI</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('menu') }}">MENU</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">KONTAK</a></li>
                </ul>
            </div>
        </nav>
        <aside>
            <div class="sidebar">
                <div class="sidebar-header">
                    <span class="sidebar-title">Menu</span>
                    <!-- Gunakan ikon close dari Font Awesome -->
                    <button class="close-btn"><i class="fas fa-times"></i></button>
                </div>
                <ul class="sidebar-nav">
                    <li><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> Tentang</a></li>
                    <li><a href="{{ route('news') }}"><i class="fas fa-newspaper"></i> Berita</a></li>
                    <li><a href="{{ route('gallery') }}"><i class="fas fa-image"></i> Galeri</a></li>
                    <li><a href="{{ route('menu') }}"><i class="fas fa-image"></i> Menu</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Kontak</a></li>
                </ul>
                <div class="sidebar-footer">
                    &copy; 2024 Tasty Food. All rights reserved.
                </div>
            </div>
        </aside>
        <!-- Konten utama di sini -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbarToggler = document.querySelector(".navbar-toggler");
        const sidebar = document.querySelector(".sidebar");
        const closeBtn = document.querySelector(".close-btn");
        const overlay = document.querySelector(".overlay");

        // Buka sidebar
        navbarToggler.addEventListener("click", function() {
            sidebar.classList.add("active");
            overlay.classList.add("active"); // Tampilkan overlay
        });

        // Tutup sidebar dengan tombol close
        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active"); // Sembunyikan overlay
        });

        // Tutup sidebar dengan klik overlay
        overlay.addEventListener("click", function() {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });
    });
</script>
