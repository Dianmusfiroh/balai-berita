<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesifikasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_spesifikasi',
        'id_balai',
    ];
    protected $table = 't_spesifikasi';
    public $timestamps = false;
}
