<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    public function index()
    {
        return PenjualanModel::all();
    }

    public function store(Request $request)
    {
        // set validation
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // create penjualan
        $penjualan = PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'image' => $request->image->hashName(),
        ]);
        // return response JSON user is created
        if ($penjualan) {
            return response()->json([
                'success' => true,
                'penjualan' => $penjualan,
            ], 201);
        }

        // return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }

    public function show($id)
    {
        $penjualan = PenjualanModel::find($id);

        // Jika penjualan ditemukan
        if ($penjualan) {
            return response()->json([
                'success' => true,
                'penjualan' => $penjualan,
            ], 200);
        }

        // Jika penjualan tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'penjualan not found.',
        ], 404);
    }
}
