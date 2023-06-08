<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramStudi::create([
            'nama' => 'Teknik Informatika',
            'fakultas_id' => 1,
        ]);

        ProgramStudi::create([
            'nama' => 'Teknik Sipil',
            'fakultas_id' => 1,
        ]);

        ProgramStudi::create([
            'nama' => 'Teknik Mesin',
            'fakultas_id' => 1,
        ]);
    }
}
