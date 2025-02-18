@extends('layouts.user')
@section('content')
    <div class="content">
        <h2><b>KONTAK KAMI</b></h2>
    </div>
    <section class="contact-container">
        <form class="container" action="{{ route('pesan.store') }}" method="POST">
            @csrf

            <h2 class="mb-5"><b>KONTAK KAMI</b></h2>

            <!-- Pesan Error Jika User Belum Login -->
            @guest
                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {!! session('error') !!}
                    </div>
                @endif

            @endguest

            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="text" placeholder="Subject" class="form-control input-field" name="subject"
                            value="{{ old('subject', $kontak->subject ?? '') }}">
                            @error('subject')
                            <small class="text-danger">{{ $pesan }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Name" class="form-control input-field" name="name"
                            value="{{ old('name', Auth::user()->name ?? '') }}">
                        @error('name')
                            <small class="text-danger">{{ $pesan }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" placeholder="Email" class="form-control input-field" name="email"
                            value="{{ old('email', Auth::user()->email ?? '') }}">
                        @error('email')
                            <small class="text-danger">{{ $pesan }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <textarea id="editor" placeholder="Message" class="form-control input-field" name="message" style="height: 12.6em">{{ old('message') }}</textarea>
                        @error('message')
                            <small class="text-danger">{{ $pesan }}</small>
                        @enderror
                    </div>

                    <!-- Input Rating -->
                    <div class="mb-3">
                        <label class="mb-2"><b>Rating</b></label>
                        <div class="rating">
                            <input type="hidden" id="ratingInput" name="rating" value="1">
                            <i class="fa-solid fa-star" value="1"></i>
                            <i class="fa-solid fa-star" value="2"></i>
                            <i class="fa-solid fa-star" value="3"></i>
                            <i class="fa-solid fa-star" value="4"></i>
                            <i class="fa-solid fa-star" value="5"></i>
                        </div>
                        @error('rating')
                            <small class="text-danger">{{ $pesan }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="action-button"><b>KIRIM</b></button>
            </div>
        </form>

    </section>

    <section class="info-section">
        @php $kontaks = App\Models\Kontak::first(); @endphp <!-- Ambil satu kontak -->
        <div class="container mb-3">
            <div class="row">
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>EMAIL</h5>
                    <p class="inpo">{{ $kontaks->email }}</p> <!-- Menampilkan email -->
                </div>
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5>PHONE</h5>
                    <p class="inpo">{{ $kontaks->no_telp }}</p> <!-- Menampilkan nomor telepon -->
                </div>
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>LOCATION</h5>
                    <p class="inpo">{{ $kontaks->alamat }}</p> <!-- Menampilkan alamat -->
                </div>
            </div>
        </div>
    </section>
    {{-- map --}}
    <section class="map">
        <div id="map">
            @php
                $kontak = App\Models\Kontak::first();
            @endphp
            <script>
                // Ambil alamat dari database yang dikirim melalui controller
                var alamat = "{{ $kontak->alamat }}";
            </script>
        </div>
    </section>
@endsection
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll(".rating i");
        const ratingInput = document.getElementById("ratingInput");

        stars.forEach(star => {
            star.addEventListener("click", function() {
                const value = this.getAttribute("value");
                ratingInput.value = value;

                // Highlight bintang
                stars.forEach(s => {
                    if (s.getAttribute("value") <= value) {
                        s.classList.add("active");
                    } else {
                        s.classList.remove("active");
                    }
                });
            });
        });
    });
</script>
