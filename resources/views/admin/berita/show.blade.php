{{-- resources/views/messages/show.blade.php --}}
@extends('layouts.admin.admin')

@section('content')
<div class="card m-4">
    <div class="card-header">
        <h3 class="card-title">Detail Berita</h3>
        <div class="float-end">
            <a href="{{ route('berita.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
    </div>

    <div class="card-body d-flex align-items-start">
        <div class="news-image me-3">
            <img src="{{ asset('/storage/berita/' . $berita->image) }}" alt="{{ $berita->judul }}" class="img-fluid" style="width: 350px; max-width: 150px; height: auto; border-radius: 18px;">
        </div>
        <div class="news-content d-flex flex-column">
            <h4>Judul: {{ $berita->judul }}</h4>
            <p><strong>Deskripsi:</strong> {{ $berita->deskripsi }}</p>
            <div class="mt-auto">
                <hr>
                <p class="beritas-date mb-3"><small>Dibuat pada: {{ $berita->created_at->format('d F Y') }}</small></p>
            </div>
        </div>
    </div>
</div>

@endsection
