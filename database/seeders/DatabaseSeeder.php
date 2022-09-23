<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            AbsensiSeeder::class,
            AnggotaSeeder::class,
            BarangSeeder::class,
            KasSeeder::class,
            KubSeeder::class,
            NotulenSeeder::class,
            ProduksiSeeder::class,
            RencanaSeeder::class,
            SuratSeeder::class,
            TamuSeeder::class,
            UsahaSeeder::class,
        ]);
    }
}
