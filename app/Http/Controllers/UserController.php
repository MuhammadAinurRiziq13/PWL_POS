<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        
        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);
        
        // Mengubah nama pengguna
        $user->username = 'manager12';
        
        // Menyimpan perubahan ke database
        $user->save();
        
        // Memeriksa apakah model pengguna sekarang bersih
        $user->wasChanged(); // false
        $user->wasChanged('username');
        $user->wasChanged(['username','level_id']);
        $user->wasChanged('nama');
        dd($user->wasChanged(['nama','username']));

        dd($user->isDirty());
    }
}

// tambah data user dengan eloquent model
// $data = [
//     'level_id' => 2,
//     'username' => 'manager_tiga',
//     'nama' => 'Manager 3',
//     'password' => Hash::make('12345'),
// ];
// UserModel::create($data);