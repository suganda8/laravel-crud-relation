<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\ProgramStudi;

class FakultasController extends Controller
{
    public function find_prodi()
    {
        $fakultas = Fakultas::with(['program_studis'])->findOrFail(request()->id);

        $prodi = $fakultas->program_studis;

        return response()->json($prodi);
    }
}
