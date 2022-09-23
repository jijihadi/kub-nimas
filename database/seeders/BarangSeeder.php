<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            [
                'kode' => 'BRG-VII-0001-BL',
                'name' => 'Kotak Tre',
                'tanggal' => '2022-07-26',
                'jumlah' => 12,
                'kondisi' => 'Baik',
                'perolehan' => 'Beli',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'kode' => 'BRG-VIII-0001-HB',
                'name' => 'Jaring Harimau',
                'tanggal' => '2022-08-26',
                'jumlah' => 2,
                'kondisi' => 'Baik',
                'perolehan' => 'Hibah',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'kode' => 'BRG-VI-0012-HB',
                'name' => 'Box Es',
                'tanggal' => '2022-06-26',
                'jumlah' => 11,
                'kondisi' => 'Rusak',
                'perolehan' => 'Hibah',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'kode' => 'BRG-VII-0032-HB',
                'name' => 'Ipad Mini',
                'tanggal' => '2022-07-16',
                'jumlah' => 7,
                'kondisi' => 'Baik',
                'perolehan' => 'Hibah',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'kode' => 'BRG-III-0001-BL',
                'name' => 'Kalender Muka Presiden',
                'tanggal' => '2022-03-26',
                'jumlah' => 5,
                'kondisi' => 'Baik',
                'perolehan' => 'Beli',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'kode' => 'BRG-VII-0012-HB',
                'name' => 'Pistol P1991',
                'tanggal' => '2022-07-21',
                'jumlah' => 4,
                'kondisi' => 'Baik',
                'perolehan' => 'Hibah',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'kode' => 'BRG-II-0001-BL',
                'name' => 'Mobil Bak L300',
                'tanggal' => '2022-02-26',
                'jumlah' => 1,
                'kondisi' => 'Baik',
                'perolehan' => 'Beli',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
            [
                'kode' => 'BRG-I-0021-HB',
                'name' => 'Kabel Roll',
                'tanggal' => '2022-01-26',
                'jumlah' => 15,
                'kondisi' => 'Baik Sebagian',
                'perolehan' => 'Hibah',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
        ]);
    }
}
