<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_visi_misi'; 

    protected $fillable = [
        'id_visi_misi',
        'jenis',
        'deskripsi',
        'id_balai',

    ];

    protected $table = 't_visi_misi';
    public $timestamps = false;
}
