<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        // return view('file-upload');
        // return view('fileUpload');
        $breadcrumb = (object)[
            'title' => 'Tambah File Upload',
            'list' => ['Home', 'File Upload', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah File Upload Baru'
        ];

        $activeMenu = 'fileUpload';

        return view('fileUpload', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    // public function prosesFileUpload(Request $request)
    // {
    // return 'Pemrosesan file upload disini';
    // dump($request->berkas);
    // dump($request->file('file'));
    // if ($request->hasFile('berkas')) {
    //     echo "path(): " . $request->berkas->path();
    //     echo "<br>";
    //     echo "extension(): " . $request->berkas->extension();
    //     echo "<br>";
    //     echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension();
    //     echo "<br>";
    //     echo "getMimeType(): " . $request->berkas->getMimeType();
    //     echo "<br>";
    //     echo "getClientOriginalName(): " . $request->berkas->getClientOriginalName();
    //     echo "<br>";
    //     echo "getSize(): " . $request->berkas->getSize();
    // } else {
    //     echo "Tidak ada berkas yang diupload";
    // }
    // $request->validate([
    //     'berkas' => 'required|file|image|max:500'
    // ]);
    // $extfile = $request->berkas->getClientOriginalName();
    // $namaFile = 'web-' . time() . "." . $extfile;

    // $path = $request->berkas->storeAs('public', $namaFile);

    // $pathBaru = asset('storage/' . $namaFile);
    // echo "proses upload berhasil, file berada di: $path";
    // echo "<br>";
    // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
    // echo $request->berkas->getClientOriginalName() . "lolos validasi";

    // $request->validate([
    //     'berkas' => 'required|file|image|max:500'
    // ]);
    // $extfile = $request->berkas->getClientOriginalName();
    // $namaFile = 'web-' . time() . "." . $extfile;

    // $path = $request->berkas->move('gambar', $namaFile);
    // $path = str_replace("\\", "//", $path);
    // echo "Variabel path berisi: $path <br>";

    // $pathBaru = asset('gambar/' . $namaFile);
    // echo "proses upload berhasil, file berada di: $path";
    // echo "<br>";
    // echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
    // }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'gambar' => 'required|file|mimes:png,jpg,jpeg,svg|max:4000'
        ]);

        $breadcrumb = (object)[
            'title' => 'Show File Upload',
            'list' => ['Home', 'File Upload', 'Show']
        ];

        $page = (object)[
            'title' => 'Show File Upload Baru'
        ];

        $activeMenu = 'fileUpload';

        $namaFile = $request->nama . '.' . $request->gambar->getClientOriginalExtension();
        $path = $request->gambar->move('gambar', $namaFile);
        $path = str_replace("\\", "/", $path);
        $path = asset('gambar/' . $namaFile);

        return view('showImage', [
            'oldName' => $request->gambar->getClientOriginalName(),
            'newName' => $namaFile,
            'path' => $path,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
}