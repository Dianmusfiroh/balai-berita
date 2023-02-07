<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use StringBackedEnum;

class BaganStrukurOrganisasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bagan_struktur'; 
    protected $fillable = [
        'id_bagan_struktur',
        'nama',
        'id_balai'

    ];

    protected $table = 't_bagan_struktur';
    public $timestamps = false;
    public function struktur(){
        return $this->belongsTo(StrukurOrganisasi::class,'id_bagan_struktur', 'id_bagan_struktur');
    }
}
