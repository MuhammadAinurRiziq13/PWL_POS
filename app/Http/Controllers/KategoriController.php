<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'kategori']
        ];

        $page = (object)[
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];
        $activeMenu = 'kategori'; 
        
        return view('kategori.index',[
            'breadcrumb' => $breadcrumb, 
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $categories = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        return DataTables::of($categories)
                ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
                ->addColumn('aksi', function ($category) { // menambahkan kolom aksi
                    $btn = '<a href="'.url('/kategori/' . $category->kategori_id).'" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="'.url('/kategori/' . $category->kategori_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="'. url('/kategori/'. $category->kategori_id).'">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
                })
                ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
                ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Kategori',
            'list' => ['Home','Kategori','Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Kategori Baru'
        ];

        $activeMenu = 'kategori';

        return view('kategori.create',[
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100',
        ]);
        
        //fungsi eloquent untuk menambah data
        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);
    
        return redirect('/kategori')->with('success', 'Data level berhasil disimpan');
    }

    public function show(string $id)
    {
        $kategori = KategoriModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Kategori',
            'list' =>['Home','Kategori','Detail']
        ];
        $page = (object)[
            'title' => 'Detail kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.show',[
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $kategori = KategoriModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Edit Kategori',
            'list' => ['Home','Kategori','Edit']
        ];
        $page = (object)[
            'title' => 'Edit Kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.edit',[
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter,dan bernilai unik 
            // di tabel m_level kolom level_kode kecuali untuk user dengan id yang sedang diedit
            'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode,'.$id.',kategori_id',
            'kategori_nama' => 'required|string|max:100',
        ]);

        KategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/kategori')->with('success', 'Data User Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if(!$check){
            redirect('/kategori')->with('error','Data kategori tidak ditemukan');
        }

        try{
            KategoriModel::destroy($id);
            return redirect('/kategori')->with('success','Data kategori berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e){
            //jika terjadi eror ketika menghapus data, redirect kembali ke halaman dengan membawa pesan eror
            return redirect('/kategori')->with('error','Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}