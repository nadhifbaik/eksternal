<?php

namespace App\Http\Controllers;

use Alert;
use Storage;
use Validator;
use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan data Aboute
        $tentangs = Tentang::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.tentang.index', compact('tentangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect ke Halaman Add aboute
        return view('admin.tentang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Add Aboute
        $this -> validate($request, [
            'image'=> 'required|image|mimes:png,jpg,jpeg',
            'judul'=> 'required',
            'deskripsi'=> 'required',
        ]);

        $tentangs = new Tentang();
        $tentangs -> judul = $request -> judul;
        $tentangs -> deskripsi = $request -> deskripsi;

        // Upload Image
        $images = $request->file('image');
        $images -> storeAs('public/tentang', $images->hashName());
        $tentangs -> image = $images->hashName();

        $tentangs -> save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);

        return redirect()->route('tentang.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tentang $tentangs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Redirect ke Halaman Update
        $tentangs = Tentang::findOrFail($id);
        return view('admin.tentang.edit', compact('tentangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //Update Aboute
        $this->validate($request, [
            'image' => 'required',
            'judul'=> 'required',
            'deskripsi'=> 'required',
        ]);

        $tentangs = Tentang::findOrFail($id);
        $tentangs -> judul = $request -> judul;
        $tentangs -> deskripsi = $request -> deskripsi;

        // upload image
        $images = $request->file('image');
        $images->storeAs('public/tentang', $images->hashName());

        // delete produk
        Storage::delete('public/tentang/'. $tentangs->images);

        $tentangs->image = $images->hashName();

        $tentangs->save();
        Alert::success('Success', 'Data updated successfully')->autoClose(2000);

        return redirect()->route('tentang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Delete Aboute
        $tentangs = Tentang::findOrFail($id);
        Storage::delete('public/tentang/'. $tentangs->foto);
        $tentangs->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');
        return redirect()->route('tentang.index');
    }
}
