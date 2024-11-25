    @extends('layouts.user')
    @section('content')
        <div class="content">
            <h2><b>TENTANG KAMI</b></h2>
        </div>
        <section class="tastyFood">
            <div class="container container-about">
                <div class="row tasty-food-section align-items-center">
                    <div class="col-12 col-md-6 text-content-tasty mb-4">
                        <h3><b>{{ $judul->judul }}</b></h3>
                        <p class="paragraph">
                            <b>{{ $judul->deskripsi }}</b>
                        </p>
                        <p class="paragraph2">
                            {{ $judul->konten }}
                        </p>
                    </div>
                    <div class="col-12 col-md-6 image-content d-flex justify-content-center">
                        <img src="{{ asset('assets1/ASET/brooke-lark-oaz0raysASk-unsplash.jpg') }}" alt="Tasty Food 1"
                            loading="lazy" class="img-fluid rounded-image me-2">
                        <img src="{{ asset('assets1/ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}"
                            alt="Tasty Food 2" loading="lazy" class="img-fluid rounded-image">
                    </div>
                </div>
            </div>
        </section>

        <section class="visi">
        <div class="container container-about mt-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 d-flex justify-content-center mb-4">
                    <img src="{{ asset('assets1/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="Visi Image 1"
                        class="img-fluid rounded-image1 me-2">
                    <img src="{{ asset('assets1/ASET/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" alt="Visi Image 2"
                        class="img-fluid rounded-image1">
                </div>
                <div class="col-12 col-md-6 text-content text-center text-md-start">
                    <h3><b>{{ $visi->judul }}</b></h3>
                    <p>{{ $visi->konten }}</p>
                </div>
            </div>
        </div>
    </section>

        <section class="misi">
        <div class="container container-about mt-5">
            <div class="row mt-5 align-items-center">
                <!-- Gambar diposisikan di atas judul untuk layar kecil -->
                <div class="col-12 col-md-6 d-flex justify-content-center order-1 order-md-2 mb-4">
                    <img src="{{ asset('assets1/ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="Misi Image"
                        class="img-fluid rounded-image-misi">
                </div>
                <!-- Teks berada di bawah gambar untuk layar kecil -->
                <div class="col-12 col-md-6 text-content text-center text-md-start order-2 order-md-1">
                    <h3><b>{{ $misi->judul }}</b></h3>
                    <p>{{ $misi->konten }}</p>
                </div>
            </div>
        </div>
    </section>

    @endsection
