@extends('layouts.user')

@section('content')
    <div class="content text-center">
        <h2><b>DETAIL BERITA</b></h2>
    </div>

    <div class="container my-5">
        <div class="row g-4 align-items-center">
            <!-- Bagian Gambar -->
            <div class="col-12 col-md-6">
                <div class="news-image p-3">
                    <img src="{{ asset('/storage/beritas/' . $news->image) }}" alt="{{ $news->judul }}"
                        class="img-fluid rounded-5 shadow-sm w-100">
                </div>
            </div>

            <!-- Bagian Teks -->
            <div class="col-12 col-md-6">
                <div class="p-3">
                    <h1 class="news-title fw-bold mb-3">{{ $news->judul }}</h1>
                    <hr>
                    <p class="news-description text-secondary">{!! $news->deskripsi !!}</p>
                    <hr>
                    <p class="news-date text-muted">
                        <small><i class="fas fa-calendar-alt"></i> <strong>{{ $news->created_at->translatedFormat('d F Y') }}</strong></small>
                    </p>
                    <p class="news-date text-muted">
                        <small><i class="fas fa-sync-alt"></i> <strong>{{ $news->updated_at->translatedFormat('d F Y') }}</strong></small>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
