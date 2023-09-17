<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    use HasFactory;
    protected $table = 'saksi';
    protected $guarded = [];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'nik', 'nik');
    }
    public function tps()
    {
        return $this->belongsTo(Tps::class, 'kode_tps', 'kode_tps');
    }
    
}