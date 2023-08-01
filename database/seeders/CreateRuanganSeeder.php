<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class CreateRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruangan = [

            [
                'nama_ruangan' => 'R01',
                'lantai' => 'Lantai 1',
                'kategori' => 'Ruangan Kelas',
            ],
            [
                'nama_ruangan' => 'R02',
                'lantai' => 'Lantai 2',
                'kategori' => 'Ruangan Lab',
            ],
            [
                'nama_ruangan' => 'R03',
                'lantai' => 'Lantai 3',
                'kategori' => 'Ruangan Aula',
            ],
            [
                'nama_ruangan' => 'R04',
                'lantai' => 'Lantai 4',
                'kategori' => 'Ruangan Serba Guna',
            ],
        ];

        foreach ($ruangan as $key => $ruangan) {
            Ruangan::create($ruangan);
        }
    }
}
