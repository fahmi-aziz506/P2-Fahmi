<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected  $table = 'menu';
    protected  $primaryKey   = 'id_menu';

    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'foto_menu',
        'kategori_id',
        'deskripsi',
        'harga',
        'outlet_id',
        'stok',
    ];

    public function outlet()
    {
        return $this->belongsTo(outlet::class, 'outlet_id', 'id_outlet');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'id_kategori');
    }
}
