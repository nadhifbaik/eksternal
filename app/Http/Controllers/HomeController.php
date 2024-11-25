<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Kontak;
use App\Models\Tentang;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $berita = Berita::count();
        $gallery = Gallery::count();
        $kontak = Kontak::count();
        $tentang = Tentang::count();
        $slider = Slider::count();
        $user = User::count();
        return view('home', compact('berita', 'gallery', 'kontak', 'tentang', 'slider', 'user'));
    }
}
