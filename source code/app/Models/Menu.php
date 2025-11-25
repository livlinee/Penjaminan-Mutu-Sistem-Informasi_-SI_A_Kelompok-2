<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    public $timestamps = false; // Tabel Anda tidak memiliki timestamps

    /**
     * Tentukan kolom mana saja yang boleh diisi.
     */
    protected $fillable = [
        'nama_menu',
        'gambar_menu',
        'kategori',
        'deskripsi_menu',
        'harga',
        'rate_menu',
    ];
}
