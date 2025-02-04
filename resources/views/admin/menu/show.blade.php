{{-- resources/views/messages/show.blade.php --}}
@extends('layouts.admin.admin')

@section('content')
<div class="card m-4">
    <div class="card-header">
        <h3 class="card-title">Detail Menu</h3>
        <div class="float-end">
            <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
    </div>

    <div class="card-body d-flex align-items-start">
        <div class="news-image me-3">
            <img src="{{ asset('/storage/menu/' . $menu->image) }}" alt="{{ $menu->name }}" class="img-fluid" style="width: 350px; max-width: 150px; height: auto; border-radius: 18px;">
        </div>
        <div class="news-content d-flex flex-column">
            <h4>Name: {{ $menu->name }}</h4>
            <p><strong>Deskripsi:</strong> {{ $menu->deskripsi }}</p>
            <p><strong>Price:</strong> {{ $menu->price }}</p>
            <div class="mt-auto">
                <hr>
                <p class="beritas-date mb-3"><small>Dibuat pada: {{ $menu->created_at->format('d F Y') }}</small></p>
            </div>
        </div>
    </div>
</div>

@endsection
