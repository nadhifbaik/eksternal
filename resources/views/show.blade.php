@extends('layouts.user')

@section('content')
<div class="content">
    <h2><b>DETAIL BERITA</b></h2>
</div>
<div class="container news-detail">
    <div class="news-content-detail mb-3">
        <div class="news-image">
            <img src="{{ asset('/storage/berita/' . $news->image) }}" alt="{{ $news->judul }}" class="img-fluid">
        </div>
        <div class="news-text">
            <h1 class="news-title mb-3">{{ $news->judul }}</h1> <hr>
            <p class="news-description mb-3">{{ $news->deskripsi }}</p><hr>
            <p class="news-date mb-3"><small>Dibuat pada: {{ $news->created_at->format('d F Y') }}</small></p> <hr>
            <p class="news-date mb-3"><small>Diperbaharui pada: {{ $news->updated_at->format('d F Y') }}</small></p>
        </div>
    </div>
</div>
@endsection
