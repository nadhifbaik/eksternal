<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function news()
    {
        return view('news');
    }
    public function contact()
    {
        return view('contact');
    }
        public function loadMore(Request $request){
        $skip = $request->input('skip', 0); // Get the current skip value
        $berita = Berita::orderBy('id', 'asc')->skip($skip)->take(8)->get(); // Load next 8 items

        return response()->json($berita);
    }
}
