<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penimbangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_penimbangan',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'data_balita_id',
    ];

    public function data_balita()
    {
        return $this->belongsTo(data_balita::class,)->onDelete('cascade');
        // return $this->belongsTo(Folder::class)->onDelete('cascade');

    }
}
