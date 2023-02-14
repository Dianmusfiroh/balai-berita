<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawasan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kawasan'; 
    protected $fillable = [
        'id_kawasan',
        'judul',
        'lokasi',
        'deskripsi',
        'foto',
        'id_balai',

    ];

    protected $table = 't_kawasan';
    public $timestamps = false;
}
