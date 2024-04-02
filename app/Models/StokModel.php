<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;

    protected $table = 't_stok';
    protected $primaryKey = 'stok_id';

    protected $guarded = ['stok_id'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class,'user_id','user_id');
    }
    
    public function barang(): BelongsTo
    {
        return $this->belongsTo(barangModel::class,'barang_id','barang_id');
    }
}