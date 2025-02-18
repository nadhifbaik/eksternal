<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::latest()->paginate();

        confirmDelete("Delete", "Apakah Anda Yakin Menghapus Pesan Ini?");
        return view('admin.pesan.index', compact('pesan'));
    }

    public function store(Request $request)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('contact')->with('error',
                'Anda harus <a href="'.route('login').'">login</a> untuk mengirim pesan atau
                <a href="">register</a> jika belum punya akun.'
            );
        }


        // Validasi input
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
            'rating' => 'nullable|numeric|min:1|max:5',
        ]);

        // Simpan pesan dengan subject otomatis ke admin
        $pesan = new Pesan();
        $pesan->users_id = Auth::id(); // ID user yang sedang login
        $pesan->subject = 'TastyFood@gmail.com'; // Subject otomatis
        $pesan->name = $request->name;
        $pesan->email = $request->email;
        $pesan->message = $request->message;
        $pesan->rating = $request->rating ?? null; // Pastikan rating tidak null jika kosong
        $pesan->save();

        toast()->success('Success', 'Pesan Sudah Dikirim');
        return redirect()->route('contact');
    }



    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);

        // Update status menjadi sudah dibaca
        $pesan->is_read = true;
        $pesan->save();

        return view('pesan.show', compact('pesan'));
    }


    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();
        toast()->success('Success', 'Data Berhasil Di Hapus')->autoClose(2000);
        return redirect()->route('pesan.index');
    }
}
