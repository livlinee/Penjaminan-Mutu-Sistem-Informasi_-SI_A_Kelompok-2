<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentor';
    protected $primaryKey = 'id_mentor';
    public $timestamps = false;

    protected $fillable = [
        'nama_mentor',
        'gambar',
        'materi',
        'jadwal_dan_waktu',
        'kontak',
        // 'id_admin' tidak perlu di-fillable karena kita tidak mengisinya dari form
    ];
}
