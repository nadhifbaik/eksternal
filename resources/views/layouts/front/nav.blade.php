<section class="header">
    {{-- Header --}}
    <div class="background-image">
        <div class="container pt-4">
            <div class="hero"></div>
            <nav class="navbar navbar-expand-lg pe-5">
                <button class="navbar-toggler" type="button">
                    <span class="toggler-icon">&#9776;</span>
                </button>
                <h1><a class="navbar-brand" href="{{ url('/dashboard') }}">TASTY FOOD</a></h1>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">TENTANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news') }}">BERITA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">GALERI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">KONTAK</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <aside class="sidebar">
                <div class="sidebar-header">
                    <span class="sidebar-title">Menu</span>
                    <button class="close-btn">&times;</button>
                </div>
                <ul class="sidebar-nav">
                    <li><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">Tentang</a></li>
                    <li><a href="{{ route('news') }}">Berita</a></li>
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
                <div class="sidebar-footer">
                    &copy; 2024 Tasty Food. All rights reserved.
                </div>
            </aside>
        </div>
        <div class="content">
            <div class="black-line mb-3"></div>
            <h1 class="mb-3" style="font-weight: 500">HEALTHY</h1>
            <h1 class="mb-3"><strong><b><b>TASTY FOOD</b></b></strong></h1>
            <p>
                <span class="konten" style="line-height: 2;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum
                    commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim
                    neque,
                    vel luctus ex. Fusce sit amet viverra ante.
                </span>
            </p>
            <a href="{{ route('about') }}" class="btn-black"><b>TENTANG KAMI</b></a>
        </div>
    </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbarToggler = document.querySelector(".navbar-toggler");
        const sidebar = document.querySelector(".sidebar");
        const closeBtn = document.querySelector(".close-btn");

        navbarToggler.addEventListener("click", function() {
            sidebar.classList.add("active");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("active");
        });

        overlay.addEventListener("click", function() {
            sidebar.classList.remove("active");
        });
    });
</script>
