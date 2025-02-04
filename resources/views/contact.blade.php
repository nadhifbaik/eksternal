@extends('layouts.user')
@section('content')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<div class="content">
        <h2><b>KONTAK KAMI</b></h2>
    </div>
<section class="contact-container">
        <form class="container" action="{{ route('message.store') }}" method="POST">
            <h2 class="mb-5"><b>TESTYMONI</b></h2>
            @csrf
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="text" placeholder="Subject" class="form-control input-field" name="subject"
                            value="{{ old('subject', 'example@gmail.com') }}">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Name" class="form-control input-field" name="name">
                    </div>
                    <div class="mb-3">
                        <input type="email" placeholder="Email" class="form-control input-field" name="email">
                    </div>
                </div>
                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <textarea placeholder="Message" class="form-control input-field" name="message" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="action-button"><b>KIRIM</b></button>
            </div>
        </form>
    </section>

    <section class="info-section">
        @php $kontak = App\Models\Kontak::first(); @endphp <!-- Ambil satu kontak -->
        <div class="container mb-3">
            <div class="row">
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>EMAIL</h5>
                    <p class="inpo">{{ $kontak->email }}</p> <!-- Menampilkan email -->
                </div>
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5>PHONE</h5>
                    <p class="inpo">{{ $kontak->no_telp }}</p> <!-- Menampilkan nomor telepon -->
                </div>
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>LOCATION</h5>
                    <p class="inpo">{{ $kontak->alamat }}</p> <!-- Menampilkan alamat -->
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
                var alamat="{{ $kontak->alamat }}" ;
            </script>
        </div>
    </section>
@endsection
