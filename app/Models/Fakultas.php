<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama'
    ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }

    public function program_studis() {
        return $this->hasMany(ProgramStudi::class);
    }
}
