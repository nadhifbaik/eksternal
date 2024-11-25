@extends('layouts.user')
@section('content')
    <div class="content">
        <h2><b>GALLERY KAMI</b></h2>
    </div>
    @php $slider = App\Models\Slider::orderBy('id', 'desc')->get(); @endphp
    <!-- Carousel -->
    <section class="slider">
        <div id="foodCarousel" class="carousel slide content-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $slider = App\Models\Slider::get();
                @endphp
                @forelse ($slider as $item)
                    <div class="carousel-item active">
                        <img src="{{ asset('/storage/slider/' . $item->slider) }}" class="d-block img-fluid" alt="Food 1">
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            Data slider belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="carousel-controls">
                <!-- Previous Button with Font Awesome Icon -->
                <button class="carousel-control-prev" type="button" data-bs-target="#foodCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <!-- Next Button with Font Awesome Icon -->
                <button class="carousel-control-next" type="button" data-bs-target="#foodCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <section class="photo">
        <div class="container container-img">
            <h2 class="photo-title mb-5"><b>GALERI FOTO</b></h2>
            <div class="row" id="photo-container">

                @php
                    $gallery = App\Models\Gallery::orderBy('created_at', 'desc')->paginate(8);
                @endphp

                @foreach ($gallery as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                        <img src="{{ asset('/storage/gallery/' . $item->image) }}" class="rounded-img img-fluid"
                            alt="Photo">
                    </div>
                @endforeach
                <div class="botten">
                    @if ($gallery->hasMorePages())
                    <a href="#" id="loadMore" onclick="loadMore(event)" class="btn-black"><b>LIHAT LEBIH BANYAK</b></a>
                    @endif
            </div>

            </div>
        </div>
    </section>

@endsection
