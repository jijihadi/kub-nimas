<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('absensis')->insert([
            [
                'kegiatan' => 'Seminar Perikanan',
                'peserta' => 'Jati Suryono',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-08',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'kegiatan' => 'Seminar Perikanan',
                'peserta' => 'Harimurti Prabowo',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-08',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'kegiatan' => 'Seminar manajemen',
                'peserta' => 'Karja Hidayanto',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-30',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'kegiatan' => 'Seminar manajemen',
                'peserta' => 'Vinsen Wibowo',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-30',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'kegiatan' => 'Workshop Penjaringan',
                'peserta' => 'Galak Winarno',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-11',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'kegiatan' => 'Workshop Penjaringan',
                'peserta' => 'Naradi Utama',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-11',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],

            [
                'kegiatan' => 'Workshop Penjaringan',
                'peserta' => 'Mursinin Sihotang',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-11',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'kegiatan' => 'Workshop Penjaringan',
                'peserta' => 'Vinsen Iswahyudi',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-11',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'kegiatan' => 'Seminar pertahanan diri',
                'peserta' => 'Gantar Damanik',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-28',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'kegiatan' => 'Seminar pertahanan diri',
                'peserta' => 'Mursita Napitupulu',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-28',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'kegiatan' => 'Seminar pengalengan ikan',
                'peserta' => 'Muni Ramadan',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-08',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'kegiatan' => 'Seminar pengalengan ikan',
                'peserta' => 'Baktianto Pratama',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-08',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'kegiatan' => 'Seminar bersama Hamzah Uwais',
                'peserta' => 'Gatra Ardianto',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-01-08',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
            [
                'kegiatan' => 'Seminar bersama Hamzah Uwais',
                'peserta' => 'Jaeman Maryadi',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-01-08',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
            [
                'kegiatan' => 'Seminar KUB',
                'peserta' => 'Asirwada Kurniawan',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-19',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
            [
                'kegiatan' => 'Seminar KUB',
                'peserta' => 'Upik Sihombing',
                'jabatan' => 'Anggota',
                'alamat' => 'Srono',
                'tanggal' => '2022-08-19',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
        ]);
    }
}
