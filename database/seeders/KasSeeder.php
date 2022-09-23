<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kas')->insert([
            [
                'uraian' => 'Penjualan Ikan Kaleng',
                'tanggal' => '2022-09-10',
                'banyaknya' => 9000000,
                'harga_satuan' => 900000,
                'masuk' => 9000000,
                'keluar' => 0,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1
            ],
            [
                'uraian' => 'Pembelian Bibit Ikan',
                'tanggal' => '2022-09-15',
                'banyaknya' => 1000000,
                'harga_satuan' => 100000,
                'masuk' => 0,
                'keluar' => 1000000,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1
            ],
            [
                'uraian' => 'Penjualan Terumbu Karang',
                'tanggal' => '2022-09-10',
                'banyaknya' => 12000000,
                'harga_satuan' => 120000,
                'masuk' => 12000000,
                'keluar' => 0,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2
            ],
            [
                'uraian' => 'Pembelian Mesin Diesel',
                'tanggal' => '2022-09-11',
                'banyaknya' => 8000000,
                'harga_satuan' => 8000000,
                'masuk' => 0,
                'keluar' => 8000000,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2
            ],
            [
                'uraian' => 'Penjualan Kapal',
                'tanggal' => '2022-09-03',
                'banyaknya' => 19000000,
                'harga_satuan' => 19000000,
                'masuk' => 19000000,
                'keluar' => 0,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3
            ],
            [
                'uraian' => 'Pembelian Jaring Ultra',
                'tanggal' => '2022-09-14',
                'banyaknya' => 1000000,
                'harga_satuan' => 100000,
                'masuk' => 0,
                'keluar' => 1000000,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3
            ],
            [
                'uraian' => 'Penjualan Olahan Ikan Kaleng',
                'tanggal' => '2022-09-20',
                'banyaknya' => 180000000,
                'harga_satuan' => 1800000,
                'masuk' => 180000000,
                'keluar' => 0,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4
            ],
            [
                'uraian' => 'Pembelian Bibit Udang',
                'tanggal' => '2022-09-25',
                'banyaknya' => 10000000,
                'harga_satuan' => 100000,
                'masuk' => 0,
                'keluar' => 10000000,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4
            ],
        ]);
    }
}
