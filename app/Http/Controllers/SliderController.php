<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Slider;
use Illuminate\Http\Request;
use Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan data Galery
        $slider = Slider::latest()->paginate(5);
        confirmDelete("Delete", "Are you sure you want to delete?");
        return view('admin.slider.index', compact('slider'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirect to page add data Galery
        // $slider = slider::all();
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menambah data Galery
        $this->validate($request, [
            'slider' => 'image|mimes:png,jpg,jpeg',
        ]);

        $slider = new Slider($request->all());

        // Upload slider
        $sliders = $request->file('slider');
        $sliders->storeAs('public/slider', $sliders->hashName());
        $slider->slider = $sliders->hashName();
        $slider->save();
        Alert::success('Success', 'Data Added Successfully')->autoClose(2000);
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //redirect ke halaman Update
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //MengUpdate data Galery
        $this->validate($request, [
            'slider' => 'required',
        ]);

        $slider = Slider::findOrFail($id);
        $sliders = $request->file('slider');
        $sliders->storeAs('public/slider', $sliders->hashName());
        Storage::delete('public/slider/' . $slider->sliders);
        $slider->slider = $sliders->hashName();
        $slider->save();
        Alert()->success('Success', 'Data Berhasil Di Edit')->autoClose(2000);
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Delete data Galery
        $slider = Slider::findOrFail($id);
        Storage::delete('public/slider/' . $slider->slider);
        $slider->delete();
        Alert::toast('Succes', 'Data successfully deleted')->success('Succes', 'Data successfully deleted');

        return redirect()->route('slider.index');
    }
}
