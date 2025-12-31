<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

    protected $fillable = [
        'kode',
        'nama',
        'email',
        'telepon',
        'role',
        'status',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }


    public function jobdesks()
    {
        return $this->hasMany(Jobdesk::class);
    }

    public function penggajians()
    {
        return $this->hasMany(Penggajian::class);
    }
    
}
