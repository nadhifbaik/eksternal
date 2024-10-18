<?php

namespace App\Http\Controllers;

use Alert;
use Storage;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function index()
    {
        $berita = Berita::latest()->paginate(5);
        confirmDelete("Delete", "Apa Kamu Yakin?");
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        // membuat validasi data
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $berita = new Berita($request->all());
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;

        //upload image
        $images = $request->file('image');
        $images->storeAs('public/berita/', $images->hashName());
        $berita->image = $images->hashName();
        $berita->save();
        Alert::success('Success', 'Data Berhasil di Simpan')->autoClose(2000);
        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //MengUpdate data Galery
        $this->validate($request, [
            'image' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;

        //upload image
        $images = $request->file('image');
        $images->storeAs('public/berita/', $images->hashName());
        Storage::delete('public/berita/' . $berita->images);
        $berita->image = $images->hashName();
        $berita->save();
        Alert()->success('Success', 'Data Berhasil Di Edit')->autoClose(2000);
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Delete Contact
        $berita = Berita::findOrFail($id);
        $berita->delete();
        toast('Data Berhasil di Hapus', 'Success')->autoClose(2000);
        return redirect()->route('berita.index');

    }
}