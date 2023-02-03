<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_peraturan',
        'judul',
        'pdf',
        'id_balai'

    ];

    protected $table = 't_peraturan';
    public $timestamps = false;
}
