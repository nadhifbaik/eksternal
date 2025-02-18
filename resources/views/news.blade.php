@extends('layouts.user')
@section('content')
    <div class="content">
        <h2><b>BERITA KAMI</b></h2>
    </div>
    <!-- Hero Section -->
    <section class="news-content">
        <div class="container news-nusantara">
            <div class="row row-news">
                <!-- Bagian Gambar Misi -->
                <div class="col-md-6">
                    <img src="{{ asset('assets1/ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="News Image"
                        class="img-fluid rounded-image-news mb-3">
                </div>
                <!-- Bagian Teks Misi -->
                <div class="col-12 col-md-6 text-content-news">
                    <h3 class="mb-4"><b>APA SAJA MAKANAN KHAS NUSANTARA?</b></h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu
                        rutrum commodo,
                        dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel
                        luctus ex. Fusce sit amet viverra ante.</p>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu
                        rutrum commodo,
                        dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel
                        luctus ex. Fusce sit amet viverra ante.</p>

                    <div class="btn-container"> <!-- Tambahkan div wrapper untuk tombol -->
                        <a href="#" class="btn-black"><b>BACA SELENGKAPNYA</b></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-other">
        <div class="container">
            <h3 class="news-other-title"><b>BERITA LAINNYA</b></h3>
            <div class="row g-5" id="news-container">
                @php
                    $news = App\Models\Berita::orderBy('id', 'desc')->paginate(4);
                    // $duplicatedNews = $news->concat($news)
                @endphp
                @foreach ($news as $item)
                    <div class="col-md-6 col-lg-3"> <!-- 4 kolom per baris pada layar besar, 2 kolom pada layar kecil -->
                        <div class="card berita-card distance-card">
                            <img alt="Fresh vegetables on a table" class="card-img-top"
                                src="{{ asset('/storage/beritas/' . $item->image) }}" />
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ Str::limit($item->judul, 15, '...') }}</h5>
                                <!-- Batasi judul hingga 50 karakter -->
                                <p class="card-text">{!! Str::limit(strip_tags($item->deskripsi), 100, '...') !!}</p>
                                <!-- Batasi deskripsi hingga 100 karakter -->
                                <a class="read-more" href="{{ route('berita.show', $item->slug) }}">
                                    Baca selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="botten">
                @if ($news->hasMorePages())
                    <a href="#" id="loadMore" onclick="loadMore(event)" class="btn-more text-white">LIHAT LEBIH
                        BANYAK</a>
                @endif
            </div>
        </div>
    </section>

    <script>
        let newsSkip = {{ $news->count() }}; // Mulai dengan jumlah berita yang ada

        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.slice(0, maxLength) + '...'; // Memotong teks dan menambahkan "..."
            }
            return text; // Jika panjang teks kurang dari batas, biarkan apa adanya
        }

        function loadMore(event) {
            event.preventDefault(); // Mencegah perilaku default link
            fetch(`{{ route('newsLoad') }}?skip=${newsSkip}`)
                .then(response => response.json())
                .then(data => {
                    const newsContainer = document.getElementById('news-container');
                    data.forEach(item => {
                        const truncatedTitle = truncateText(item.judul, 15); // Batasi judul hingga 15 karakter
                        const truncatedDescription = truncateText(item.deskripsi,
                            100); // Batasi deskripsi hingga 15 karakter

                        const newItem = document.createElement('div');
                        newItem.className = 'col-md-6 col-lg-3';
                        newItem.innerHTML = `
                    <div class="card berita-card distance-card">
                        <img alt="Fresh vegetables on a table" class="card-img-top"
                            src="{{ asset('/storage/beritas/') }}/${ item.image }" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">${ truncatedTitle }</h5>
                            <p class="card-text">${ truncatedDescription }</p>
                                <a class="read-more" href="{{ route('berita.show', '') }}/${ item.slug }" />
                                Baca selengkapnya
                            </a>
                        </div>
                    </div>`;
                        newsContainer.appendChild(newItem);
                    });
                    newsSkip += data.length; // Increment skip untuk pemuatan berikutnya
                    if (data.length < 4) {
                        document.getElementById('loadMore').style.display = 'none'; // Sembunyikan jika tidak ada lagi
                    }
                })
                .catch(error => console.error('Error loading more news:', error));
        }
    </script>
@endsection
