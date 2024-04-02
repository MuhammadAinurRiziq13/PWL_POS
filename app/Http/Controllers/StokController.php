<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object)[
            'title' => 'Daftar Stok Barang yang terdaftar dalam sistem'
        ];
        $activeMenu = 'stok'; //set menu yang sedang aktif
        
        $barang = barangModel::all();
        $user = UserModel::all();
        
        return view('stok.index',[
            'breadcrumb' => $breadcrumb, 
            'page' => $page,
            'barang' => $barang,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    // Ambil data Barang dalam bentuk json untuk datatables 
    public function list(Request $request)
    {
        $Stocs = StokModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal','stok_jumlah')
                ->with('barang')->with('user');
        //filter data Barang berdasarkan kategori_id
        if($request->user_id)
        {
            $Stocs->where('user_id', $request->user_id);
        }

        return DataTables::of($Stocs)
                ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
                ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi
                    $btn = '<a href="'.url('/stok/' . $stok->stok_id).'" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="'.url('/stok/' . $stok->stok_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="'. url('/stok/'.$stok->stok_id).'">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
                })
                ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Stok',
            'list' => ['Home','Stok','Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Stok Baru'
        ];

        $barang = barangModel::all();
        $user = UserModel::all();
        $activeMenu = 'stok';

        return view('stok.create',[
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'barang' => $barang,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_kode' => 'required|string|min:3|unique:m_barang,barang_kode',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required|integer',
        ]);
        
        //fungsi eloquent untuk menambah data
        StokModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id
        ]);
    
        return redirect('/barang')->with('success', 'Data Barang berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stok = StokModel::with('user')->with('barang')->find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Stok',
            'list' =>['Home','Stok','Detail']
        ];
        $page = (object)[
            'title' => 'Detail Stok'
        ];
        $activeMenu = 'stok';
        return view('stok.show',[
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'stok' => $stok,
            'activeMenu' => $activeMenu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stok = StokModel::find($id);
        $barang = barangModel::all();
        $user = UserModel::all();
        $breadcrumb = (object)[
            'title' => 'Edit stok',
            'list' => ['Home','stok','Edit']
        ];
        $page = (object)[
            'title' => 'Edit stok'
        ];
        $activeMenu = 'stok';
        return view('stok.edit',[
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'barang' => $barang,
            'stok' => $stok,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_kode' => 'required|string|min:3|unique:m_barang,barang_kode,'.$id.',Barang_id',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required|integer',
        ]);

        StokModel::find($id)->update([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,
        ]);
        
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/barang')->with('success', 'Data Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = StokModel::find($id);
        if(!$check){
            redirect('/barang')->with('error','Data Barang tidak ditemukan');
        }

        try{
            StokModel::destroy($id);
            return redirect('/barang')->with('success','Data Barang berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e){
            //jika terjadi eror ketika menghapus data, redirect kembali ke halaman dengan membawa pesan eror
            return redirect('/barang')->with('error','Data Barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}