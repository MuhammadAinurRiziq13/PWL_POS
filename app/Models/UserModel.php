<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    protected $primaryKey = 'user_id'; //mendefinisikan nama tabel yang digunakan oleh model ini
    protected $table = 'm_user'; //mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
