<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_balai',
        'logo_balai',
        'foto_balai',
        'alamat',
        'deskripsi',

    ];

    protected $table = 't_balai';
    public $timestamps = false;

}
