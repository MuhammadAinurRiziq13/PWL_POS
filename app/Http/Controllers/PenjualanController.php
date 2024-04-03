<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Transaksi Penjualan',
            'list' => ['Home', 'Penjualan']
        ];

        $page = (object)[
            'title' => 'Daftar Transaksi Penjualan dalam sistem'
        ];
        $activeMenu = 'penjualan';

        $user = UserModel::all();

        return view('penjualan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $Penjualan = PenjualanModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')
            ->with('user');

        if ($request->user_id) {
            $Penjualan->where('user_id', $request->user_id);
        }

        return DataTables::of($Penjualan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {
                $btn = '<a href="' . url('/penjualan/' . $penjualan->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penjualan/' . $penjualan->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $penjualan->penjualan_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Penjualan'
        ];

        $activeMenu = 'penjualan';

        $users = UserModel::all();
        $barang = barangModel::all();

        return view('penjualan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'user' => $users,
            'barang' => $barang
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'pembeli' => 'required|string|max:100',
        ]);

        $penjualan = new PenjualanModel();
        $penjualan->user_id = $request->user_id;
        $penjualan->pembeli = $request->pembeli;
        $penjualan->penjualan_kode = 'PJ-' . date('YmdHis');
        $penjualan->penjualan_tanggal = date('Y-m-d H:i:s');
        $penjualan->save();

        for ($i = 0; $i < count($request->barang_id); $i++) {
            $detail = new PenjualanDetailModel();
            $detail->penjualan_id = $penjualan->penjualan_id;
            $detail->barang_id = $request->barang_id[$i];
            $detail->jumlah = $request->jumlah[$i];

            $barang = BarangModel::find($request->barang_id[$i]);
            $detail->harga = $barang->harga_jual;

            $detail->save();

            // Kurangi stok barang
            StokModel::where('barang_id', $request->barang_id[$i])->decrement('stok_jumlah', $request->jumlah[$i]);
        }

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penjualan = PenjualanModel::with('user')->with('penjualan_detail')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'penjualan' => $penjualan
        ]);
    }

    public function edit($id)
    {
        $penjualan = PenjualanModel::with('user')->with('penjualan_detail')->find($id);

        $breadcrumb = (object) [
            'title' => 'Edit penjualan',
            'list' => ['Home', 'penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit penjualan'
        ];

        $activeMenu = 'penjualan';

        $barang = BarangModel::all();
        $users = UserModel::all();

        return view('penjualan.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'penjualan' => $penjualan,
            'barang' => $barang,
            'user' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'pembeli' => 'required|string|max:100',
        ]);

        $penjualan = PenjualanModel::find($id);
        $penjualan->user_id = $request->user_id;
        $penjualan->pembeli = $request->pembeli;
        $penjualan->save();

        $penjualan->penjualan_detail()->delete();

        for ($i = 0; $i < count($request->barang_id); $i++) {
            $detail = new PenjualanDetailModel();
            $detail->penjualan_id = $penjualan->penjualan_id;
            $detail->barang_id = $request->barang_id[$i];
            $detail->jumlah = $request->jumlah[$i];

            $barang = BarangModel::find($request->barang_id[$i]);
            $detail->harga = $barang->harga_jual;

            $detail->save();
            $barang->save();
        }

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
    }

    public function destroy($id)
    {
        $check = PenjualanModel::find($id);
        if (!$check) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try {
            PenjualanDetailModel::where('penjualan_id', $id)->delete();
            PenjualanModel::find($id)->delete();
            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/penjualan')->with('error', 'Data penjualan gagal dihapus ' . $e->getMessage());
        }
    }
}
