<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Kontak;
use App\Models\User;
use App\Models\Tentang;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {

        // Ambil berita terbaru terlebih dahulu
        $latestNews = Berita::orderBy('created_at', 'desc')->first();

        // Ambil berita lainnya dari yang terbaru sampai terlama, kecuali yang terbaru
        $otherNews = Berita::orderBy('created_at', 'desc')->skip(1)->take(4)->get();


        $judul = Tentang::Find(1);
        $berita = Berita::count();
        $gallery = Gallery::count();
        $kontak = Kontak::count();
        $user = User::count();
        return view('admin', compact('berita', 'gallery', 'kontak', 'user','judul', 'latestNews', 'otherNews',));
    }
    public function loadMore(Request $request){
        $skip = $request->input('skip', 0); // Get the current skip value
        $gallery = Gallery::orderBy('id', 'asc')->skip($skip)->take(8)->get(); // Load next 8 items

        return response()->json($gallery);
    }
}
