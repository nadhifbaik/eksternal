    @extends('layouts.user')
    @section('content')
        <div class="content">
            <h2><b>TENTANG KAMI</b></h2>
        </div>
        <section class="tastyFood">
            <div class="container">
                <div class="row tasty-food-section">
                    <div class="col-md-6 text-content-tasty">
                        <h3><b>{{ $judul->judul }}</b></h3>
                        <p class="paragraph">
                            <b>{{ $judul->deskripsi }}</b>
                        </p>
                        <p class="paragraph2">
                            {{ $judul->konten }}
                        </p>
                    </div>
                    <div class="col-md-6 image-content d-flex justify-content-around">
                        <img src="{{ asset('assets1/ASET/brooke-lark-oaz0raysASk-unsplash.jpg') }}" alt="Tasty Food 1"
                            loading="lazy" class="img-fluid rounded-image">
                        <img src="{{ asset('assets1/ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}"
                            alt="Tasty Food 2" loading="lazy" class="img-fluid rounded-image">
                    </div>
                </div>
            </div>
        </section>

        <section class="visi">
            <div class="container mt-5">
                <div class="row">
                    <!-- Bagian Gambar Visi -->
                    <div class="col-md-6 d-flex justify-content-around">
                        <img src="{{ asset('assets1/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="Visi Image 1"
                            class="img-fluid rounded-image1">
                        <img src="{{ asset('assets1/ASET/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" alt="Visi Image 2"
                            class="img-fluid rounded-image1">
                    </div>
                    <!-- Bagian Teks Visi -->
                    <div class="col-md-6 text-content">
                        <h3><b>{{ $visi->judul }}</b></h3>
                        <p>{{ $visi->konten }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="misi">
            <div class="container mt-5">
                <div class="row mt-5">
                    <!-- Bagian Teks Misi -->
                    <div class="col-md-6 text-content">
                        <h3><b>{{ $misi->judul }}</b></h3>
                        <p>{{ $misi->konten }}</p>
                    </div>
                    <!-- Bagian Gambar Misi -->
                    <div class="col-md-6">
                        <img src="{{ asset('assets1/ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="Misi Image"
                            class="img-fluid rounded-image-misi">
                    </div>
                </div>
            </div>
        </section>
        
    @endsection
