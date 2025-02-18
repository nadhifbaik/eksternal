@extends('layouts.admin.admin')
@section('content')
    <div class="card m-4 card-primary card-outline mb-4">
        <div class="card-header">
            <h3 class="card-title">berita</h3>
            <div class="float-end">
                <a href="{{ route('berita.index') }}" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <div class="ms-auto">
                </div>
            </div>
                <div class="card-body">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="foto" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                id="inputUserstatus" placeholder="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                id="deskripsi" rows="4" placeholder="Deskripsi"></textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                <button type="reset" class="btn btn-warning  px-4">Reset</button>
                            </div>
                        </div>
                </div>
                </form>
            </table>
            {{-- {!! $beritaes->withQueryString()->links('pagination::bootstrap-4') !!} --}}
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
@endsection
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    document.querySelectorAll("textarea").forEach((el) => {
        ClassicEditor.create(el)
            .catch(error => console.error(error));
    });
</script>
