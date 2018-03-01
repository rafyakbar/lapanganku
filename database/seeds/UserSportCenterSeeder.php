<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Support\Role;
use Faker\Factory;
use App\Provinsi;

class UserSportCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $kecamatan_id = '3578030';

        /**
         * pembuatan user root
         */
        User::create([
            'nama' => 'Rafy Aulia Akbar',
            'email' => 'rafyakbar@mhs.unesa.ac.id',
            'kecamatan_id' => $kecamatan_id,
            'password' => bcrypt('secret'),
            'role' => Role::ROOT
        ]);
        User::create([
            'nama' => 'Rezky Arisanti Putri',
            'email' => 'rezkyputri@mhs.unesa.ac.id',
            'kecamatan_id' => $kecamatan_id,
            'password' => bcrypt('secret'),
            'role' => Role::ROOT
        ]);
        User::create([
            'nama' => 'Fino',
            'email' => 'finoprayudi@mhs.unesa.ac.id',
            'kecamatan_id' => $kecamatan_id,
            'password' => bcrypt('secret'),
            'role' => Role::ROOT
        ]);

        $jatim = Provinsi::where('nama', 'JAWA TIMUR')->first();

        foreach ($jatim->getKecamatan() as $kecamatan){
            /**
             * pemilik, pegawai dan sport center
             */
            for($c = 0; $c < rand(2, 4); $c++){
                User::create([

                ]);
            }
        }
    }
}
