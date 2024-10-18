<?php

namespace App\Http\Controllers;

use Alert;
use Storage;
use Validator;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function index()
    {
        $message = Messages::all();
        confirmDelete("Delete", "Apa Kamu Yakin?");
        return view('admin.message.index', compact('message'));
    }

    public function create()
    {
        return view('admin.message.create');
    }


    public function store(Request $request)
    {
        // membuat validasi data
        $this->validate($request, [
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $message = new Messages();
        $message->subject = $request->subject;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        Alert::success('Success', 'Data Berhasil di Simpan')->autoClose(5000);
        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $message = Messages::findOrFail($id);
        return view('admin.message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $message = Messages::findOrFail($id);
        $message->subject = $request->subject;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        Alert::success('Success', 'Data Berhasil di Edit')->autoClose(5000);
        return redirect()->route('message.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Delete Contact
        $message = Messages::findOrFail($id);
        $message->delete();
        toast('Data Berhasil di Hapus', 'Success')->autoClose(5000);
        return redirect()->route('message.index');

    }
}

