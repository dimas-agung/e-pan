<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
    
    public function scopeSaksi(Builder $query): void
    {
        $query->where('is_saksi', true);
    }
    public function scopeAnggota(Builder $query): void
    {
        $query->where('is_saksi', false);
    }
}
