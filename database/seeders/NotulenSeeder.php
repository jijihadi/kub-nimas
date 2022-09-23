<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotulenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notulens')->insert([
            [
                'kegiatan' => 'Seminar Perikanan',
                'tanggal' => '2022-08-08 12:00:00',
                'pembicara' => 'Gamani Samosir',
                'jabatan' => 'KABAG BOIP',
                'materi' => 'Materi tentang ikan laut asin',
                'kesimpulan' => 'Bahwa ikan itu asin',
                'id_kub' => 1
            ],
            [
                'kegiatan' => 'Seminar manajemen',
                'tanggal' => '2022-08-30 12:00:00',
                'pembicara' => 'Jaswadi Marbun',
                'jabatan' => 'KABID UDKO',
                'materi' => 'Materi tentang mana jemen makan temen',
                'kesimpulan' => 'Bahwa temen demen jemen',
                'id_kub' => 1
            ],
            [
                'kegiatan' => 'Workshop Penjaringan',
                'tanggal' => '2022-08-11 12:00:00',
                'pembicara' => 'Artanto Tarihoran',
                'jabatan' => 'KAUR BBKP',
                'materi' => 'Materi tentang pelatihan penjaringan ikan',
                'kesimpulan' => 'Bahwa ikan bisa dijaring',
                'id_kub' => 2
            ],
            [
                'kegiatan' => 'Seminar Pembangunan',
                'tanggal' => '2022-08-18 12:00:00',
                'pembicara' => 'BJ Habibi',
                'jabatan' => 'Anggota IME',
                'materi' => 'Materi tentang membangun bangsa',
                'kesimpulan' => 'Bahwa bangsa bisa dibangun',
                'id_kub' => 2
            ],
            [
                'kegiatan' => 'Seminar pertahanan diri',
                'tanggal' => '2022-08-28 12:00:00',
                'pembicara' => 'Warsa Pradana',
                'jabatan' => 'Ketua DKTU',
                'materi' => 'Materi tentang mempertahankan diri',
                'kesimpulan' => 'Bahwa diri bisa dipertahankan',
                'id_kub' => 3
            ],
            [
                'kegiatan' => 'Seminar pengalengan ikan',
                'tanggal' => '2022-08-08 12:00:00',
                'pembicara' => 'Cakrabuana Pangestu',
                'jabatan' => 'KAUR JKKIS',
                'materi' => 'Materi tentang ikan kaleng',
                'kesimpulan' => 'Bahwa ikan bisa dikaleng',
                'id_kub' => 3
            ],
            [
                'kegiatan' => 'Seminar bersama Hamzah Uwais',
                'tanggal' => '2022-01-08 12:00:00',
                'pembicara' => 'Hamzah Uwais',
                'jabatan' => 'KABAG SIRPO',
                'materi' => 'Materi tentang manajemen manusia',
                'kesimpulan' => 'Bahwa manusia mana jemen',
                'id_kub' => 4
            ],
            [
                'kegiatan' => 'Seminar KUB',
                'tanggal' => '2022-08-19 12:00:00',
                'pembicara' => 'Balijan Megantara',
                'jabatan' => 'Ketua KUB Internasional',
                'materi' => 'Materi tentang mengurus KUB',
                'kesimpulan' => 'Bahwa KUB bisa kurus',
                'id_kub' => 4
            ],
        ]);
    }
}
