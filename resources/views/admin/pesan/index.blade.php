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
            <a href="{{route('pesan.create')}}" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<h6 class="mb-0 text-uppercase">Pesan</h6>
<hr>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Subject</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Rating</th>
                        <th>Kapan Pesan Dibuat</th>
                        {{-- <th>Status</th> --}}
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($pesan as $data)
                        <tr class="align-middle">
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->subject }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->message }}</td>
                            <td>
                                {{ $data->rating }}
                                <i class="fa-solid fa-star text-warning"></i>
                            </td>
                            <td>{{ $data->created_at ? $data->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') : 'N/A' }}
                            </td>
                            {{-- <td>
                                @if ($data->is_read)
                                    <i class="fa-regular fa-circle-check text-success"></i>
                                    <span class="text-success">Sudah Dibaca</span>
                                @else
                                    <i class="fa-regular fa-circle-xmark text-danger"></i>
                                    <span class="text-danger">Belum Dibaca</span>
                                @endif
                            </td> --}}

                            <td class="text-center">
                                <form action="{{ route('pesan.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="action-buttons-grid">
                                        {{-- <a href="{{ route('pesan.edit', $data->id) }}"
                                            class="btn btn-sm btn-success">Edit</a> --}}
                                        {{-- <a href="{{ route('pesan.show', $data->id) }}"
                                            class="btn btn-sm btn-warning">Show</a> --}}
                                        <a href="{{ route('pesan.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                            data-confirm-delete="true">Delete</a>
                                    </div> 
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                Data Data Belum Tersedia.
                            </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
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
