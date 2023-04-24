<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_hp',
    ];
    protected $table = 't_masyarakat';
    public $timestamps = false;
}
