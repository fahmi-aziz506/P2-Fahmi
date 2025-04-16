<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{

    protected  $table = 'outlet';
    protected  $primaryKey   = 'id_outlet';

    use HasFactory;

    protected $fillable = [
        'nama_outlet',
        'alamat',
        'kecamatan_perusahaan',
        'kota_perusahaan',
        'provinsi_perusahaan',
        'kode_pos',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    public function menu()
    {
        return $this->hasMany(menu::class);
    }

    public function mejas() {}

    public function pesanans() {}
}
