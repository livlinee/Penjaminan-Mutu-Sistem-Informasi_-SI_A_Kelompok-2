<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_keranjang',
        'total_transaksi',
        'opsi_pembayaran',
        'nama_pelanggan', 
        'nomor_meja',     
        'order_group_id', 
        'email',
    ];

    public function detailKeranjang()
    {
        return $this->belongsTo(DetailKeranjang::class, 'id_keranjang', 'id_detail_keranjang');
    }
}
