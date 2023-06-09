<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\ProgramStudi;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        if (request()->has('search')) {
            $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%'.request()->search.'%')->paginate(1);
        } else {
            $mahasiswas = Mahasiswa::paginate(1);
        }
        
        return view('pages.index', ['mahasiswas' => $mahasiswas]);
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        $prodi = ProgramStudi::all();
        
        return view('pages.create', ['fakultas' => $fakultas, 'prodi' => $prodi]);
    }

    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nbi' => $request->nbi,
            'fakultas_id' => $request->fakultas_id,
            'program_studis_id' => $request->program_studis_id,
        ]);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $fakultas = Fakultas::all();
        $prodi = ProgramStudi::all();

        return view('pages.edit', ['mhs' => $mahasiswa, 'fakultas' => $fakultas, 'prodi' => $prodi]);
    }

    public function update(Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($request->id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nbi = $request->nbi;
        $mahasiswa->fakultas_id = $request->fakultas_id;
        $mahasiswa->program_studis_id = $request->program_studis_id;
        $mahasiswa->save();

        return redirect()->route('index');
    }

    public function delete($id)
    {
        Mahasiswa::findOrFail($id)->delete();

        return redirect()->route('index');
    }
    
}
