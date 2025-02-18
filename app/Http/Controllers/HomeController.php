<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Kontak;
use App\Models\Menu;
use App\Models\Tentang;
use App\Models\Pesan;
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
        $menu = Menu::count();
        $berita = Berita::count();
        $gallery = Gallery::count();
        $kontak = Kontak::count();
        $tentang = Tentang::count();
        $pesan = Pesan::count();
        $user = User::count();
        return view('home', compact('berita', 'gallery', 'kontak', 'tentang', 'pesan', 'user', 'menu'));
    }
}
