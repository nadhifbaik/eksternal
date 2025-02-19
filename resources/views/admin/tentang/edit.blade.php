@extends('layouts.admin.admin')
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
                <a href="{{ route('tentang.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tentang.update', ['tentang' => $tentangs->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invlaid @enderror"
                        placeholder="judul">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="konten" class="form-label">Konten</label>
                    <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" id="konten" rows="4"
                        placeholder="Konten"></textarea>
                    @error('konten')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4"
                        placeholder="Deskripsi"></textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    <button class="btn btn-sm btn-warning" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
