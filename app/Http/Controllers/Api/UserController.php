<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }

    public function store(Request $request)
    {
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), //password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);
        return response()->json($user, 201);
    }

    public function show(UserModel $user)
    {
        return UserModel::find($user);
    }

    public function update(Request $request, UserModel $user)
    {
        $user->update($request->all());
        return UserModel::find($user);
    }

    public function destroy(UserModel $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus',
        ]);
    }
}
