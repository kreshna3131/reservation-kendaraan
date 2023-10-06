<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kendaraan;

class KendaraanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Kendaraan::create([
                'nama' => 'Motor X',
                'foto' => 'default.jpg',
                'jenis_kendaraan' => 'motorbebek',
                'jumlah_unit' => '35',
                'harga_sewa' => '60000',
                'keterangan' => 'Tersedia dengan 2 jas hujan dan 2 helm',
            ]);
            Kendaraan::create([
                'nama' => 'Motor Y',
                'foto' => 'default.jpg',
                'jenis_kendaraan' => 'motormatic',
                'jumlah_unit' => '35',
                'harga_sewa' => '75000',
                'keterangan' => 'Tersedia dengan 2 jas hujan dan 2 helm',
            ]);
            Kendaraan::create([
                'nama' => 'Motor Z',
                'foto' => 'default.jpg',
                'jenis_kendaraan' => 'motorsport',
                'jumlah_unit' => '35',
                'harga_sewa' => '85000',
                'keterangan' => 'Tersedia dengan 2 jas hujan dan 2 helm',
            ]);
        });
    }
}
