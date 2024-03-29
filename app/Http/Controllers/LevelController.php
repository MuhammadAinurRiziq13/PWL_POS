<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $data = LevelModel::all(); // Mengambil semua isi tabel
        return view('level.index', compact('data'))->with('i');
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(LevelRequest $request)
    {
        // retrived the validated input data 
        $validated = $request->validated();

        // retrived a portion of the validated input data
        $validated = $request->safe()->only(['level_kode','level_nama']);
        $validated = $request->safe()->except(['level_kode','level_nama']);
        
        //fungsi eloquent untuk menambah data
        LevelModel::create($request->all());
    
        return redirect()->route('level.index')
        ->with('success', 'Level Berhasil Ditambahkan');
    }

        /**
     * Display the specified resource.
     */
    public function show(string $id, LevelModel $data)
    {
        $data = LevelModel::findOrFail($id);
        return view('level.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = LevelModel::find($id);
        return view('level.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        LevelModel::find($id)->update($request->all());
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('level.index')
        ->with('success', 'Data Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= LevelModel::findOrFail($id)->delete();
        return \redirect()->route('level.index')

        -> with('success', 'data Berhasil Dihapus');
    }
}