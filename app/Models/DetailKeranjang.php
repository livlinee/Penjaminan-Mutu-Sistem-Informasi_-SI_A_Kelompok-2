<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeranjang extends Model
{
    use HasFactory;

    protected $table = 'detail_keranjang';
    protected $primaryKey = 'id_detail_keranjang';
    public $timestamps = false;

    protected $fillable = [
        'id_menu',
        'jumlah_menu',
        'sub_harga',
        'total_pembayaran',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_keranjang', 'id_detail_keranjang');
    }
}
