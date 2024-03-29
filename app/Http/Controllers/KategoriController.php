<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now(),
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' .$row.' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' .$row.' baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori',['data' => $data]);
    }

    public function create(){
        return view('kategori.create');
    }

    // public function store(Request $request):RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'kategori_kode' => 'bail|required|unique:m_kategori|max:5',
    //         'kategori_nama' => 'bail|required|unique:m_kategori|max:20',
    //     ]);
    //     return redirect('/kategori');
        
    //     // KategoriModel::create([
    //     //     'kategori_kode' => $request->kodeKategori,
    //     //     'kategori_nama' => $request->namaKategori,
    //     // ]);
    // }
    public function store(StorePostRequest $request): RedirectResponse
    {
        // retrived the validated input data 
        $validated = $request->validated();

        // retrived a portion of the validated input data
        $validated = $request->safe()->only(['kategori_kode','kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode','kategori_nama']);

        // store the proses
        KategoriModel::create($request->all());
        return redirect('/kategori');
    }

    public function update($id){
        $kategori = KategoriModel::find($id);
        return view('kategori.update',['data' => $kategori]);
    }

    public function update_save($id, Request $request){
        $kategori = KategoriModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}