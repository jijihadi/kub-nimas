<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surats')->insert([
            [
                'nomor' => 'JSA/2022/VIII/KO/91',
                'tanggal' => '2022-08-03',
                'tanggal_masuk' => '2022-08-03',

                'perihal_masuk' => 'Pemberitahuan',
                
                'tujuan_masuk' => 'Ketua KUB',
                
                'tindak_lanjut' => 'Forwarded',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'nomor' => 'KLR/2022/VI/KR/11',
                'tanggal' => '2022-08-04',

                'tanggal_keluar' => '2022-08-04',
                
                'perihal_keluar' => 'Pengajuan Kerja Sama',
                
                'tujuan_keluar' => 'KABAG MJS',
                'tindak_lanjut' => 'Dikirim',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'nomor' => 'DOU/2022/VIII/GG/99',
                'tanggal' => '2022-08-02',
                'tanggal_masuk' => '2022-08-02',

                'perihal_masuk' => 'Informasi',
                
                'tujuan_masuk' => 'Ketua KUB',
                
                'tindak_lanjut' => 'Diarsip',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'nomor' => 'KLR/2022/VII/KR/81',
                'tanggal' => '2022-08-04',

                'tanggal_keluar' => '2022-08-04',
                
                'perihal_keluar' => 'Pengajuan Pelelangan',
                
                'tujuan_keluar' => 'KAUR DDI',
                'tindak_lanjut' => 'Dikirim',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'nomor' => 'XAS/2022/III/KO/01',
                'tanggal' => '2022-02-03',
                'tanggal_masuk' => '2022-02-03',

                'perihal_masuk' => 'Permohonan penangguhan',
                
                'tujuan_masuk' => 'Ketua KUB',
                
                'tindak_lanjut' => 'Forwarded',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'nomor' => 'KLR/2022/IX/KR/28',
                'tanggal' => '2022-09-04',

                'tanggal_keluar' => '2022-09-04',
                
                'perihal_keluar' => 'Pengajuan Kredit',
                
                'tujuan_keluar' => 'BANK MANTAP',
                'tindak_lanjut' => 'Dikirim',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'nomor' => 'ROD/2022/VII/KO/11',
                'tanggal' => '2022-07-03',
                'tanggal_masuk' => '2022-07-03',

                'perihal_masuk' => 'Penarikan Karyawan',
                
                'tujuan_masuk' => 'Ketua KUB',
                
                'tindak_lanjut' => 'Forwarded',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
            [
                'nomor' => 'KLR/2022/X/KR/43',
                'tanggal' => '2022-10-04',

                'tanggal_keluar' => '2022-10-04',
                
                'perihal_keluar' => 'Pengajuan Magang',
                
                'tujuan_keluar' => 'KABAG BGJK',
                'tindak_lanjut' => 'Dikirim',
                'keterangan' => 'Aman',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
        ]);
    }
}
