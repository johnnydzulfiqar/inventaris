<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Faker\Factory as Faker;

class CreateKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [

            [
                'nama_kategori' => 'Laptop',
                'kode_ring' => '1002.11.2.555.66',
            ],
            [
                'nama_kategori' => 'Komputer',
                'kode_ring' => '10.11.2.555.99',
            ],
            [
                'nama_kategori' => 'Meja',
                'kode_ring' => '2.11.2.555.99'
            ],
            [
                'nama_kategori' => 'Keyboard',
                'kode_ring' => '77.11.2.555.898'
            ],
        ];

        foreach ($kategori as $key => $kategori) {
            Kategori::create($kategori);
        }
    }
}
