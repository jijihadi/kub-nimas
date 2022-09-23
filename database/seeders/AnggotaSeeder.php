<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggotas')->insert([
            [
                'name' => 'Gamani Simbolon',
                'alamat' => 'Medan',
                'jabatan' => 'anggota',
                'pendidikan' => 'SD',
                'usia' => '40',
                'usaha_utama' => 'Saham',
                'usaha_sampingan' => '',
                'jumlah_perahu' => '1',
                'jenis_alat' => 'pancing',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'name' => 'Sakura Melani',
                'alamat' => 'Sumbawa',
                'jabatan' => 'anggota',
                'pendidikan' => 'SMP',
                'usia' => '80',
                'usaha_utama' => 'Nelayan',
                'usaha_sampingan' => 'Jiki',
                'jumlah_perahu' => '12',
                'jenis_alat' => 'Pukat',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'name' => 'Lasmanto Hutapea',
                'alamat' => 'Muncar',
                'jabatan' => 'Wakil Ketua',
                'pendidikan' => 'S1',
                'usia' => '30',
                'usaha_utama' => 'Nelayan',
                'usaha_sampingan' => 'Maling',
                'jumlah_perahu' => '32',
                'jenis_alat' => 'Pukat',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'name' => 'Artawan Wacana',
                'alamat' => 'Maghligai',
                'jabatan' => 'anggota',
                'pendidikan' => 'SMK',
                'usia' => '40',
                'usaha_utama' => 'Pengacara',
                'usaha_sampingan' => 'Nelayan',
                'jumlah_perahu' => '12',
                'jenis_alat' => 'Jaring',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'name' => 'Yoga Hutagalung',
                'alamat' => 'Fakfak',
                'jabatan' => 'anggota',
                'pendidikan' => 'STM',
                'usia' => '40',
                'usaha_utama' => 'Pengelana',
                'usaha_sampingan' => 'Nelayan',
                'jumlah_perahu' => '10',
                'jenis_alat' => 'Pukat',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'name' => 'Lukman Irawan',
                'alamat' => 'Sirawi',
                'jabatan' => 'anggota',
                'pendidikan' => 'SD',
                'usia' => '30',
                'usaha_utama' => 'Nelayan',
                'usaha_sampingan' => 'Cap Botol',
                'jumlah_perahu' => '1',
                'jenis_alat' => 'Pancing',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'name' => 'Taufik Napitupulu',
                'alamat' => 'Jember',
                'jabatan' => 'anggota',
                'pendidikan' => 'SMP',
                'usia' => '22',
                'usaha_utama' => 'Nelayan',
                'usaha_sampingan' => '',
                'jumlah_perahu' => '8',
                'jenis_alat' => 'Jaring',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'name' => 'Kairav Utama',
                'alamat' => 'Sulanggit',
                'jabatan' => 'anggota',
                'pendidikan' => 'SMA',
                'usia' => '20',
                'usaha_utama' => 'Nelayan',
                'usaha_sampingan' => 'Trader',
                'jumlah_perahu' => '33',
                'jenis_alat' => 'Jaring Harimau',
                'keterangan' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
        ]);
    }
}
