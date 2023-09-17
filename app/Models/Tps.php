<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Tps extends Model
{
    use HasFactory;
    protected $table = 'tps';
    protected $guarded = [];
    
    public function scopeRekapitulasiKabupaten(Builder $query)  {
        
        return $query->join('saksi', function ($join) {
            $join
                 ->on('saksi.kabupaten', '=', 'tps.kabupaten')
                 ->on('saksi.kecamatan', '=', 'tps.kecamatan');
        });
    }
    public function scopeRekapitulasiKecamatan(Builder $query)  {
        
        return $query->join('saksi', function ($join) {
            $join
                 ->on('saksi.kabupaten', '=', 'tps.kabupaten')
                 ->on('saksi.kecamatan', '=', 'tps.kecamatan');
        });
    }
    public function scopeRekapitulasiDesa(Builder $query)  {
        
        return $query->join('saksi', function ($join) {
            $join
                 ->on('saksi.kabupaten', '=', 'tps.kabupaten')
                 ->on('saksi.kecamatan', '=', 'tps.kecamatan')
                 ->on('saksi.desa', '=', 'tps.desa');
        });
    }
}