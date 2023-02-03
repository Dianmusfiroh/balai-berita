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

    ];

    protected $table = 't_balai';
    public $timestamps = false;

}
