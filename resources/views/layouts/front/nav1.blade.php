<div class="background-image-other">
    <div class="container pt-4">
        <nav class="navbar navbar-expand-lg pe-4 nav-other">
            <button class="navbar-toggler" type="button">
                    <span class="toggler-icon">&#9776;</span>
                </button>
            <h1><a class="navbar-brand tasty-food" href="{{ url('/dashboard') }}">TASTY FOOD</a></h1>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">TENTANG</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">GALERI</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">KONTAK</a></li>
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
</div>

