<?php

namespace App\Http\Controllers;

Use Alert;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan data Galery
        $gallery = Gallery::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.gallery.index', compact('gallery'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirect to page add data Galery
        // $gallery = Gallery::all();
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menambah data Galery
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg',
            'slider' => 'image|mimes:png,jpg,jpeg',
        ]);

        $gallery = new Gallery($request->all());

        // Upload Images
        $images = $request->file('image');
        $images->storeAs('public/gallery', $images->hashName());
        $gallery->image = $images->hashName();

        $sliders = $request->file('slider');
        $sliders->storeAs('public/gallery', $sliders->hashName());
        $gallery->slider = $sliders->hashName();
        $gallery->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //redirect ke halaman Update
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //MengUpdate data Galery
        $this->validate($request, [
            'image' => 'required',
            'slider' => 'image|nullable|mimes:jpeg,jpg,png',
        ]);

        $gallery = Gallery::findOrFail($id);
        $images = $request->file('image');
        $images->storeAs('public/gallery', $images->hashName());
        Storage::delete('public/gallery/' . $gallery->images);
        $gallery->image = $images->hashName();

        if ($request->hasFile('slider')) {
            // Hapus gambar lama jika ada
            Storage::delete('public/slider/' . $gallery->image);

            // Simpan gambar baru
            $sliders = $request->file('slider');
            $sliders->storeAs('public/slider', $sliders->hashName());
            $gallery->slider = $sliders->hashName();
        }

        $gallery->save();
        Alert()->success('Success', 'Data Berhasil Di Edit')->autoClose(2000);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Delete data Galery
        $gallery = Gallery::findOrFail($id);
        Storage::delete('public/gallery/' . $gallery->image);
        Storage::delete('public/slider/' . $gallery->slider);
        $gallery->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');

        return redirect()->route('gallery.index');
    }
}
