<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_hp',
        'status',
        'keluhan',
        'tanggapan',
        'id_balai',
    ];
    protected $table = 'keluhan';
    public $timestamps = false;
}
