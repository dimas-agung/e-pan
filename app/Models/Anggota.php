<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $guarded = [];

    public function saksi()
    {
        return $this->belongsTo(Saksi::class, 'nik', 'nik');
    }
    public function getSaksi()
    {
        return 'lowest price';
        return $this->where(['is_saksi', 1]);
    }
    function isSaksi()
    {
        $this->where(['is_saksi', 1]);
    }
}
