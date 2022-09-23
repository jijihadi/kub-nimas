<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rencanas')->insert([
            [
                'name' => 'Seminar Kelautan',
                'volume' => 100,
                'waktu' => '2022-10-23 11:20:00',
                'tempat' => 'Gudang A',
                'keterangan' => 'Peserta: Nelayan',
                'id_kub' => 1,
            ],
            [
                'name' => 'Kerja Bakti',
                'volume' => 30,
                'waktu' => '2022-11-23 11:20:00',
                'tempat' => 'Kantor KUB',
                'keterangan' => 'Peserta: semua anggota',
                'id_kub' => 1,
            ],
            [
                'name' => 'Seminar Pelalangan',
                'volume' => 55,
                'waktu' => '2022-12-23 11:20:00',
                'tempat' => 'Pasar lelang',
                'keterangan' => 'Peserta: pedagang',
                'id_kub' => 2,
            ],
            [
                'name' => 'Pembangunan Musholla',
                'volume' => 30,
                'waktu' => '2022-10-23 11:20:00',
                'tempat' => 'Pondasi depan kantor',
                'keterangan' => 'Peserta: semua anggota',
                'id_kub' => 2,
            ],
            [
                'name' => 'Pelelangan Martin Emas',
                'volume' => 500,
                'waktu' => '2022-12-23 11:20:00',
                'tempat' => 'Pasar Barat',
                'keterangan' => 'Peserta: Pengusaha',
                'id_kub' => 3,
            ],
            [
                'name' => 'Syukuran mendekati tahun baru',
                'volume' => 50,
                'waktu' => '2022-12-29 11:20:00',
                'tempat' => 'Kantor',
                'keterangan' => 'Peserta: semua anggota',
                'id_kub' => 3,
            ],
            [
                'name' => 'Seminar Pembangunan',
                'volume' => 150,
                'waktu' => '2022-10-22 11:20:00',
                'tempat' => 'Kantor KUB',
                'keterangan' => 'Peserta: semua anggota',
                'id_kub' => 4,
            ],
            [
                'name' => 'Peresmian Pabrik Kaleng',
                'volume' => 50,
                'waktu' => '2022-10-12 11:20:00',
                'tempat' => 'Pabrik Baru',
                'keterangan' => 'Peserta: semua anggota',
                'id_kub' => 4,
            ],
            [
                'name' => 'Pelepasan Kapal Baru',
                'volume' => 20,
                'waktu' => '2022-11-11 11:20:00',
                'tempat' => 'Pantai Timur',
                'keterangan' => 'Peserta: petinggi kub',
                'id_kub' => 4,
            ],
        ]);
    }
}
