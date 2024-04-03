<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenjualanDetailModel extends Model
{
    use HasFactory;
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';

    protected $guarded = ['detail_id'];
    
    public function barang(): BelongsTo
    {
        return $this->belongsTo(barangModel::class,'barang_id','barang_id');
    }

    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(PenjualanModel::class,'penjualan_id','penjualan_id');
    }
    
}