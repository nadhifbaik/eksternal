@extends('layouts.admin.admin')
@section('content')
    <div class="card m-4 card-primary card-outline mb-4">
        <div class="card-header">
            <h3 class="card-title">Tentang</h3>
            <div class="float-end">
                <a href="{{ route('pesan.index') }}" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <div class="ms-auto">
                </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pesan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control @error('subject') is-invlaid @enderror"
                        placeholder="subject">
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invlaid @enderror"
                        placeholder="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputEmailAddress" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="inputEmailAddress" placeholder="jhon@example.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="4"
                        placeholder="message"></textarea>
                    @error('message')
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
        {{-- {!! $tentanges->withQueryString()->links('pagination::bootstrap-4') !!} --}}
    </div> <!-- /.card-body -->
    </div> <!-- /.card -->
@endsection
