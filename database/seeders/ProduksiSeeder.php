<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('produksis')->insert([
            [
                'tanggal' => '2022-08-20',
                'nama_anggota' => 'Gamani Simbolon',
                'jumlah' => 100,
                'nilai' => '50000000',
                'keterangan' => 'Aman',
                'id_kub' => 1,
            ],
            [
                'tanggal' => '2022-09-20',
                'nama_anggota' => 'Gamani Simbolon',
                'jumlah' => 1000,
                'nilai' => '4000000',
                'keterangan' => 'Aman',
                'id_kub' => 1,
            ],
            [
                'tanggal' => '2022-06-20',
                'nama_anggota' => 'Artawan Wacana',
                'jumlah' => 700,
                'nilai' => '60000000',
                'keterangan' => 'OK',
                'id_kub' => 2,
            ],
            [
                'tanggal' => '2022-07-20',
                'nama_anggota' => 'value',
                'jumlah' => 100,
                'nilai' => '90000000',
                'keterangan' => 'OK',
                'id_kub' => 2,
            ],
            [
                'tanggal' => '2022-08-01',
                'nama_anggota' => 'Lukman Irawan',
                'jumlah' => 600,
                'nilai' => '80000000',
                'keterangan' => 'Sip',
                'id_kub' => 3,
            ],
            [
                'tanggal' => '2022-08-13',
                'nama_anggota' => 'Lukman Irawan',
                'jumlah' => 1000,
                'nilai' => '1000000000',
                'keterangan' => 'Sip',
                'id_kub' => 3,
            ],
            [
                'tanggal' => '2022-04-20',
                'nama_anggota' => 'Kairav Utama',
                'jumlah' => 100,
                'nilai' => '1000000',
                'keterangan' => 'Fix',
                'id_kub' => 4,
            ],
            [
                'tanggal' => '2022-05-20',
                'nama_anggota' => 'Kairav Utama',
                'jumlah' => 400,
                'nilai' => '4000000',
                'keterangan' => 'Fix',
                'id_kub' => 4,
            ],
        ]);
    }
}
