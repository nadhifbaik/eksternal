@extends('layouts.user')
@section('content')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<h2 class="thick"><b>KONTAK KAMI</b></h2>
<section class="contact-container">
        <h2 class="mb-5"><b>KONTAK KAMI</b></h2>
        <form action="{{route('message.store')}}" class="contact-layout" method="POST">
            @csrf
            <div class="left-column">
                <div class="form-group">
                    <input type="text" placeholder="Subject"  class="input-field" name="subject">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Name" class="input-field" name="name">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" class="input-field" name="email">
                </div>
            </div>
            <div class="right-column">
                <div class="form-group">
                    <textarea placeholder="Message" class="input-field textarea-field" name="message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="action-button"><b>KIRIM</b></button>
            </div>
        </form>
    </section>

    <section class="info-section">
        @php $kontak = App\Models\Kontak::first(); @endphp
        <div class="container mb-3">
            <div class="row">
                <div class="col-12 col-md-4 col-sm-4  contact-info">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>EMAIL</h5>
                    <p class="inpo">{{ $kontak->email }}</p>
                </div>
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5>PHONE</h5>
                    <p class="inpo">{{ $kontak->no_telp }}</p>
                </div>
                <div class="col-md-4 contact-info">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>LOCATION</h5>
                    <p class="inpo">{{ $kontak->alamat }}</p>
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
