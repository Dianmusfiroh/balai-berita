<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasBalai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tugas'; 

    protected $fillable = [
        'id_tugas',
        'nama_tugas',
        'id_balai',

    ];

    protected $table = 't_tugas';
    public $timestamps = false;
}
