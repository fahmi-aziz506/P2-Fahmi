<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected  $table = 'kategori';
    protected  $primaryKey   = 'id_kategori';

    use HasFactory;

    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'deskripsi',
    ];
}
