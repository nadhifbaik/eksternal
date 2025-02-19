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
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('berita.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('berita.update', $beritas->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="foto" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        id="inputUserstatus" placeholder="image" value="{{ old($beritas->image) }}">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invlaid @enderror"
                        placeholder="judul" value="{{$beritas->judul}}">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                        id="deskripsi" rows="4" placeholder="Deskripsi">{{ old('deskripsi', $beritas->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">`
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

<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    document.querySelectorAll("textarea").forEach((el) => {
        ClassicEditor.create(el)
            .catch(error => console.error(error));
    });
</script>
