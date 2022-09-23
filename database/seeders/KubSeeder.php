<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kubs')->insert([
            [
                'name' => 'KUB Kertajaya',
                'alamat' => 'Kertajaya',
                'jumlah_anggota' => 10,
                'kelas' => 'Pusat',
                'noreg_skt' => 'KTJY-00192-9800',
                'noreg_pupi' => 'PP-889923-HGJ-01',
                'id_ketua' => 1,
            ],
            [
                'name' => 'KUB Ronggolawis',
                'alamat' => 'Ronggolawis',
                'jumlah_anggota' => 27,
                'kelas' => 'Cabang',
                'noreg_skt' => 'RGLW-09231-7329',
                'noreg_pupi' => 'PP-099231-IKA-01',
                'id_ketua' => 2,
            ],
            [
                'name' => 'KUB Burmaniskala',
                'alamat' => 'Burmaniskala',
                'jumlah_anggota' => 90,
                'kelas' => 'Cabang',
                'noreg_skt' => 'BMNS-99123-9012',
                'noreg_pupi' => 'PP-682371-DDT-95',
                'id_ketua' => 3,
            ],
            [
                'name' => 'KUB Sringgalit',
                'alamat' => 'Sringgalit',
                'jumlah_anggota' => 8,
                'kelas' => 'Pusat',
                'noreg_skt' => 'SRGL-72188-8872',
                'noreg_pupi' => 'PP-612380-FCX-88',
                'id_ketua' => 4,
            ],
        ]);
    }
}
