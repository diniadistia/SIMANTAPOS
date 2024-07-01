<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_balita extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'NIK anak',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ayah',
        'nama_ibu',
    ];

    public function penimbangans()
    {
        return $this->belongsTo(Penimbangan::class, 'id_penimbangan');
        // return $this->belongsTo(Folder::class)->onDelete('cascade');

    }

    public function orangTua()
    {
        return $this->belongsTo(data_orangtua::class, 'id_data_orangtua');
    }
}
