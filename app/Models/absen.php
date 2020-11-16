<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $table = 'absen_karyawan';
    protected $fillable = [
        'nama', 'jurusan', 'alamat',
        ];
}
