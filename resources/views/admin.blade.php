@extends('layouts.home')
@section('content')
    {{-- content About --}}
    <section class="aboute mt-3">
        <div class="grid-container p-3 text-center ">
            <h2 class="m-3"><b>TENTANG KAMI</b></h2>
            <div class=" abouteText col-6 mx-center my-4 text-center">
                <p class="abouteText">
                    {{ $judul->konten }}
                </p>
            </div>
            <div class="black-line mb-3"></div><br>
        </div>
    </section>

    {{-- content Article --}}
    <section class="content-article">
        <div class="article gap-3">
            <div class="card">
                <img class="card-image" src="{{ asset('assets1/ASET/img-1.png') }}" alt="">
                <h2 class="card1 mb-3">
                    <b class="article-title">LOREM IPSUM</b>
                </h2>
                <p class="mb-3 article-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>
            <div class="card">
                <img class="card-image" src="{{ asset('assets1/ASET/img-2.png') }}" alt="">
                <h2 class="card1 mb-3">
                    <b class="article-title">LOREM IPSUM</b>
                </h2>
                <p class="mb-3 article-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>
            <div class="card">
                <img class="card-image" src="{{ asset('assets1/ASET/img-3.png') }}" alt="">
                <h2 class="card1 mb-3">
                    <b class="article-title">LOREM IPSUM</b>
                </h2>
                <p class="mb-3 article-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>
            <div class="card">
                <img class="card-image" src="{{ asset('assets1/ASET/img-4.png') }}" alt="">
                <h2 class="card1 mb-3">
                    <b class="article-title">LOREM IPSUM</b>
                </h2>
                <p class="mb-3 article-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>
        </div>
    </section>


    {{-- content News --}}
    <section class="content-news">
        <div class="news p-3">
            <h2 class="m-3"><b>BERITA KAMI</b></h2>
            <div class="container-news">
                <div class="row">
                    <div class="col-md-6">
                        <div class="news-card-big">
                            <div class="aspect-ratio">
                                <img src="{{ asset('/storage/beritas/' . $latestNews->image) }}" class="news-img-top"
                                    alt="{{ $latestNews->title }}">
                            </div>
                            <div class="news-body content-news mb-auto">
                                <h5 class="news-title">{{ $latestNews->judul }}</h5>
                                <p class="news-text-big">{!! Str::limit(strip_tags($latestNews->deskripsi), 550) !!}</p>
                                <a href="{{ route('berita.show', $latestNews->slug) }}" class="read-more card-news-big">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            @foreach ($otherNews as $news)
                                <div class="col-sm-6">
                                    <div class="news-card mb-4">
                                        <div class="aspect-ratio">
                                            <img src="{{ asset('/storage/beritas/' . $news->image) }}" class="news-img-top"
                                                alt="{{ $news->title }}">
                                        </div>
                                        <div class="news-body">
                                            <h5 class="news-title">{{ Str::limit($news->judul, 15) }}</h5>
                                            <p class="news-text">{!! Str::limit(strip_tags($news->deskripsi), 100) !!}</p>
                                            <a href="{{ route('berita.show', $news->slug) }}" class="read-more">Baca
                                                selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    {{-- content Galery --}}
    <section class="photo" style="background-color: white">
        <div class="container-img">
            <div class="gallery-title p-3">
                <h2 class="m-3"><b>GALLERI KAMI</b></h2>
            </div>
            <div class="row content-img">
                @php
                    $gallery = App\Models\Gallery::orderBy('id', 'asc')->get();
                @endphp
                @foreach ($gallery->take(6) as $item)
                    <div class="col-md-4 col-sm-4">
                        <img src="{{ asset('/storage/gallery/' . $item->image) }}" class="rounded-img" alt="Food"
                            loading="lazy">
                    </div>
                @endforeach
            </div>
            <div class="botten">
                <a class="btn-more" href="{{ route('gallery') }}">
                    LIHAT LEBIH BANYAK
                </a>
            </div>
        </div>
    </section>
@endsection
