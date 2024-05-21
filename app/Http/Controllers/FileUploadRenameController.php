<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadRenameController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload-rename');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'gambar' => 'required|file|mimes:png,jpg,jpeg,svg|max:4000'
        ]);

        $namaFile = $request->nama . '.' . $request->gambar->getClientOriginalExtension();
        $path = $request->gambar->move('gambar', $namaFile);
        $path = str_replace("\\", "/", $path);
        $path = asset('gambar/' . $namaFile);

        return view('show-image', [
            'oldName' => $request->gambar->getClientOriginalName(),
            'newName' => $namaFile,
            'path' => $path,
        ]);
    }
}
