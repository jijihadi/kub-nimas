<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usahas')->insert([
            [
                'tanggal' => '2022-06-18',
                'uraian' => 'Usaha pembuatan ikan kering',
                'volume' => 80,
                'pelaksana' => 'ketua kub',
                'tempat' => 'Gudang 11',
                'hasil' => 'Produk Ikan kering',
                'keterangan' => 'Ok',
                'id_kub' => 1
            ],
            [
                'tanggal' => '2022-07-18',
                'uraian' => 'Usaha pembuatan jaring pukat',
                'volume' => 12,
                'pelaksana' => 'KABAG KUB',
                'tempat' => 'Kantor KUB',
                'hasil' => 'Produk jaring pukat',
                'keterangan' => 'Ok',
                'id_kub' => 1
            ],
            [
                'tanggal' => '2022-06-11',
                'uraian' => 'Usaha pengelolaan tambak',
                'volume' => 1,
                'pelaksana' => 'Ketua KUB',
                'tempat' => 'Tambak Pengemis Selatan',
                'hasil' => 'Produk kepemilikan tambak',
                'keterangan' => 'Ok',
                'id_kub' => 2
            ],
            [
                'tanggal' => '2022-07-28',
                'uraian' => 'Usaha pemetaan lahan jaring',
                'volume' => 1,
                'pelaksana' => 'KU Jaringan KUB',
                'tempat' => 'Laut timur',
                'hasil' => 'Produk peta perikanan',
                'keterangan' => 'Ok',
                'id_kub' => 2
            ],
            [
                'tanggal' => '2022-06-10',
                'uraian' => 'Usaha pendirian cabang kub',
                'volume' => 1,
                'pelaksana' => 'Perangkat KUB',
                'tempat' => 'Muncar',
                'hasil' => 'Produk cabang KUB baru',
                'keterangan' => 'Ok',
                'id_kub' => 3
            ],
            [
                'tanggal' => '2022-06-22',
                'uraian' => 'Usaha pembekuan ikan',
                'volume' => 8000,
                'pelaksana' => 'Anggota KUB',
                'tempat' => 'pabrik pembeku',
                'hasil' => 'Produk ikan beku',
                'keterangan' => 'Ok',
                'id_kub' => 3
            ],
            [
                'tanggal' => '2022-07-18',
                'uraian' => 'Usaha budidaya ikan',
                'volume' => 20,
                'pelaksana' => 'Anggota KUB',
                'tempat' => 'Gudang depan',
                'hasil' => 'Produk bibit ikan',
                'keterangan' => 'Ok',
                'id_kub' => 4
            ],
            [
                'tanggal' => '2022-08-18',
                'uraian' => 'Usaha budidaya terumbu karang',
                'volume' => 40,
                'pelaksana' => 'Ketua KUB',
                'tempat' => 'Gudang Samping',
                'hasil' => 'Produk Terumbu karang',
                'keterangan' => 'Ok',
                'id_kub' => 4
            ],
        ]);
    }
}
