<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tamus')->insert([
            [
                'nama' => 'Vinsen Saragih',
                'telp' => '085405359527',
                'jabatan' => 'Ketua KUB sebelah',
                'tanggal_datang' => '2022-07-25',
                'tanggal_pulang' => '2022-07-27',
                'keperluan' => 'Mampir',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'nama' => 'Lembah Saputra',
                'telp' => '087003537686',
                'jabatan' => 'Kadin PRDP',
                'tanggal_datang' => '2022-08-25',
                'tanggal_pulang' => '2022-08-27',
                'keperluan' => 'Cross-Check',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 1,
            ],
            [
                'nama' => 'Leo Haryanto',
                'telp' => '089857038035',
                'jabatan' => 'KU Dinas Nelayan',
                'tanggal_datang' => '2022-07-12',
                'tanggal_pulang' => '2022-07-12',
                'keperluan' => 'Cek Peralatan',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'nama' => 'Luis Dabukke',
                'telp' => '085853676035',
                'jabatan' => 'Kabag BUMN',
                'tanggal_datang' => '2022-07-15',
                'tanggal_pulang' => '2022-07-17',
                'keperluan' => 'Cek Alat',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 2,
            ],
            [
                'nama' => 'Bakijan Hidayanto',
                'telp' => '084820054210',
                'jabatan' => 'Ketua BUMN',
                'tanggal_datang' => '2022-07-30',
                'tanggal_pulang' => '2022-07-30',
                'keperluan' => 'Sidak',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'nama' => 'Chandra Pradana',
                'telp' => '083611342217',
                'jabatan' => 'Ketua Urusan BUMN',
                'tanggal_datang' => '2022-07-15',
                'tanggal_pulang' => '2022-07-16',
                'keperluan' => 'Sidak',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 3,
            ],
            [
                'nama' => 'Wahyu Saputra',
                'telp' => '084019858201',
                'jabatan' => 'Kadin DRIP',
                'tanggal_datang' => '2022-07-01',
                'tanggal_pulang' => '2022-07-02',
                'keperluan' => 'Silaturahmi',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
            [
                'nama' => 'Taswir Sihotang',
                'telp' => '088287523539',
                'jabatan' => 'KPPT Riandi',
                'tanggal_datang' => '2022-07-25',
                'tanggal_pulang' => '2022-07-27',
                'keperluan' => 'Sidak',
                'kesan' => 'Ok',
                'pesan' => 'Tidak',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'id_kub' => 4,
            ],
        ]);
    }
}
