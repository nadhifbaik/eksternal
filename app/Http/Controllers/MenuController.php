<?php

namespace App\Http\Controllers;

use Alert;
use Storage;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $menu = Menu::latest()->paginate(5);
        confirmDelete("Delete", "Apa Kamu Yakin?");
        return view('admin.menu.index', compact('menu'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        // membuat validasi data
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg',
            'name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
        ]);

        $menu = new Menu($request->all());
        $menu->name = $request->name;
        $menu->deskripsi = $request->deskripsi;
        $menu->price = $request->price;

        //upload image
        $images = $request->file('image');
        $images->storeAs('public/menu/', $images->hashName());
        $menu->image = $images->hashName();
        $menu->save();
        Alert::success('Success', 'Data Berhasil di Simpan')->autoClose(2000);
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // vallidate form
        $this->validate($request, [
            'image' => 'image|nullable|mimes:jpeg,jpg,png',
            'name' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->deskripsi = $request->deskripsi;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            Storage::delete('public/menu/' . $menu->image);

            // Simpan gambar baru
            $image = $request->file('image');
            $image->storeAs('public/menu', $image->hashName());
            $menu->image = $image->hashName();
        }

        $menu->save();

        Alert()->success('Success', 'Data Berhasil Di Edit');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Delete Contact
        $menu = Menu::findOrFail($id);
        $menu->delete();
        toast('Data Berhasil di Hapus', 'Success')->autoClose(2000);
        return redirect()->route('menu.index');

    }
}
