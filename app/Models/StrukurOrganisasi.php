<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukurOrganisasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_struktur'; 

    protected $fillable = [
        'id_struktur',
        'nama',
        'jabatan',
        'id_bagan_struktur'

    ];

    protected $table = 't_struktur';
    public $timestamps = false;
    public function baganStruktur() {
        return $this->belongsTo(BaganStrukurOrganisasi::class,'id_bagan_struktur', 'id_bagan_struktur');
    }
}
