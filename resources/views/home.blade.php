@extends('layouts.admin.admin')

@section('content')
    <center>
        <h1>SELAMAT DATANG DI</h1>
        <h2>HALAMAN ADMIN</h2>
    </center>
<div class="row row-cols-1 row-cols-xl-3">
    <div class="col">
          <div class="card rounded-4">
            <div class="card-body">
              <div class="d-flex align-items-center gap-3">
                <div class="wh-48 d-flex bg-black text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                  <span class="material-icons-outlined">leaderboard</span>
                </div>
                <div class="">
                  <div class="d-flex align-items-center align-self-end text-success mb-1">
                    <p class="mb-0"></p>
                    <span class="material-icons-outlined">arrow_drop_up</span>
                  </div>
                  <h4 class="mb-0">{{ $berita }}</h4>
                  <p class="mb-0">Data Table Berita</p>
                </div>
              </div>
              <p class="mb-0"></p>
              <div class="mt-4">
                <p class="mb-2 d-flex align-items-center justify-content-between"><span
                    class=""></span></p>
                <div class="" style="height: 6px;">
                  <div class="" style="width: 65%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4">
            <div class="card-body">
              <div class="d-flex align-items-center gap-3">
                <div class="wh-48 d-flex bg-black text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                  <span class="material-icons-outlined">leaderboard</span>
                </div>
                <div class="">
                  <div class="d-flex align-items-center align-self-end text-success mb-1">
                    <p class="mb-0"></p>
                    <span class="material-icons-outlined">arrow_drop_up</span>
                  </div>
                  <h4 class="mb-0">{{ $gallery }}</h4>
                  <p class="mb-0">Data Table Gallery</p>
                </div>
              </div>
              <p class="mb-0"></p>
              <div class="mt-4">
                <p class="mb-2 d-flex align-items-center justify-content-between"><span
                    class=""></span></p>
                <div class="" style="height: 6px;">
                  <div class="" style="width: 65%"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4">
            <div class="card-body">
              <div class="d-flex align-items-center gap-3">
                <div class="wh-48 d-flex bg-black text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                  <span class="material-icons-outlined">leaderboard</span>
                </div>
              </div>
              <p class="mb-0"></p>
              <div class="mt-4">
                <p class="mb-2 d-flex align-items-center justify-content-between"><span
                    class=""></span></p>
                <div class="" style="height: 6px;">
                  <div class="" style="width: 65%"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4">
            <div class="card-body">
              <div class="d-flex align-items-center gap-3">
                <div class="wh-48 d-flex bg-black text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                  <span class="material-icons-outlined">leaderboard</span>
                </div>
                <div class="">
                  <div class="d-flex align-items-center align-self-end text-success mb-1">
                    <p class="mb-0"></p>
                    <span class="material-icons-outlined">arrow_drop_up</span>
                  </div>
                  <h4 class="mb-0">{{ $kontak }}</h4>
                  <p class="mb-0">Data Table Kontak</p>
                </div>
              </div>
              <p class="mb-0"></p>
              <div class="mt-4">
                <p class="mb-2 d-flex align-items-center justify-content-between"><span
                    class=""></span></p>
                <div class="" style="height: 6px;">
                  <div class="" style="width: 65%"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4">
            <div class="card-body">
              <div class="d-flex align-items-center gap-3">
                <div class="wh-48 d-flex bg-black text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                  <span class="material-icons-outlined">leaderboard</span>
                </div>
                <div class="">
                  <div class="d-flex align-items-center align-self-end text-success mb-1">
                    <p class="mb-0"></p>
                    <span class="material-icons-outlined">arrow_drop_up</span>
                  </div>
                  <h4 class="mb-0">{{ $tentang }}</h4>
                  <p class="mb-0">Data Table Tentang</p>
                </div>
              </div>
              <p class="mb-0"></p>
              <div class="mt-4">
                <p class="mb-2 d-flex align-items-center justify-content-between"><span
                    class=""></span></p>
                <div class="" style="height: 6px;">
                  <div class="" style="width: 65%"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col">
          <div class="card rounded-4">
            <div class="card-body">
              <div class="d-flex align-items-center gap-3">
                <div class="wh-48 d-flex bg-black text-warning bg-opacity-10 align-items-center justify-content-center rounded-circle">
                  <span class="material-icons-outlined">leaderboard</span>
                </div>
                <div class="">
                  <div class="d-flex align-items-center align-self-end text-success mb-1">
                    <p class="mb-0"></p>
                    <span class="material-icons-outlined">arrow_drop_up</span>
                  </div>
                  <h4 class="mb-0">{{ $slider }}</h4>
                  <p class="mb-0">Data Table Slider</p>
                </div>
              </div>
              <p class="mb-0"></p>
              <div class="mt-4">
                <p class="mb-2 d-flex align-items-center justify-content-between"><span
                    class=""></span></p>
                <div class="" style="height: 6px;">
                  <div class="" style="width: 65%"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div><!--end row-->
@endsection
