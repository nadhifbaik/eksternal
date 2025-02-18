@extends('layouts.admin.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tasty Food</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title">Berita</h3>
            <div class="float-end">
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Images</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($beritas as $data)
                        <tr class="align-middle">
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('/storage/beritas/' . $data->image) }}" class="rounded"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                            </td>
                            <td>
                                <span class="text-toggle" onclick="toggleText(this)">
                                    {{ Str::limit($data->judul, 30, ' ...') }}
                                </span>
                                <span class="full-text" style="display: none;">{{ $data->judul }}</span>
                            </td>
                            <td>
                                <span class="text-toggle" onclick="toggleText(this)">
                                    {!! Str::limit(strip_tags($data->deskripsi), 30, ' ...') !!}
                                </span>
                                <span class="full-text" style="display: none;">{!! $data->deskripsi !!}</span>

                            </td>
                            <td class="text-center">
                                <form action="{{ route('berita.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="action-buttons-grid">
                                        <a href="{{ route('berita.edit', $data->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('berita.show', $data->id) }}"
                                            class="btn btn-sm btn-warning text-white">Show</a>
                                        <a href="{{ route('berita.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                            data-confirm-delete="true">Delete</a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Data Data Belum Tersedia.
                            </td>
                    @endforelse
                </tbody>
            </table>
            {{-- {!! $galeries->withQueryString()->links('pagination::bootstrap-4') !!} --}}
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
    <script>
        function toggleText(element) {
            const fullTextElement = element.nextElementSibling; // Ambil elemen berikutnya yang merupakan teks penuh
            const isHidden = fullTextElement.style.display === 'none';

            // Tampilkan atau sembunyikan teks penuh
            if (isHidden) {
                fullTextElement.style.display = 'inline'; // Tampilkan teks penuh
                element.style.display = 'none'; // Sembunyikan teks terbatas
            } else {
                fullTextElement.style.display = 'none'; // Sembunyikan teks penuh
                element.style.display = 'inline'; // Tampilkan teks terbatas
            }
        }
    </script>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['pdf', 'excel']
                }
            }
        });
    </script>
@endpush
