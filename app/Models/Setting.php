<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'telepon',
        'email_perusahaan',
        'path_logo',
        'kartu_anggota',
        'outlet_id'

    ];

    public function outlet()
    {
        return $this->belongsTo(outlet::class, 'outlet_id', 'id_outlet');
    }
}
