<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultas;
use App\Models\ProgramStudi;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'nbi',
        'fakultas_id',
        'program_studis_id'
    ];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class);
    }

    public function program_studis() {
        return $this->belongsTo(ProgramStudi::class);
    }
}
