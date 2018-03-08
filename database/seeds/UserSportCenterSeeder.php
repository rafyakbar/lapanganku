<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Support\Role;
use Faker\Factory;
use App\Provinsi;
use App\SportCenter;
use App\Support\Hari;

class UserSportCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
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
        $counter = 0;
        foreach ($jatim->getKecamatan() as $kecamatan){
            /**
             * pemilik, pegawai dan sport center
             */
            for($c = 0; $c < rand(1, 3); $c++){
                //membuat sport center
                $sc = SportCenter::create([
                    'kecamatan_id' => $kecamatan->id,
                    'nama' => $faker->firstName.' Sport Center',
                    'dir' => '',
                    'alamat' => $faker->unique()->streetAddress,
                    'keterangan' => $faker->realText(rand(1000,1750)),
                    'hari_libur' => implode(';', collect(Hari::ALL)->random(rand(0,2))->toArray())
                ]);
                //membuat owner
                User::create([
                    'nama' => ($f = $faker->firstName).' '.($l = $faker->lastName),
                    'email' => strtolower($f).strtolower($l).++$counter.'@lapanganku.com',
                    'sportcenter_id' => $sc->id,
                    'kecamatan_id' => $kecamatan->id,
                    'password' => bcrypt('secret'),
                    'role' => Role::PEMILIK
                ]);

                //membuat pegawai
                for ($i = 0; $i < rand(1, 2); $i++){
                    User::create([
                        'nama' => ($f = $faker->firstName).' '.($l = $faker->lastName),
                        'email' => strtolower($f).strtolower($l).++$counter.'@lapanganku.com',
                        'sportcenter_id' => $sc->id,
                        'kecamatan_id' => $kecamatan->id,
                        'password' => bcrypt('secret'),
                        'role' => Role::PEGAWAI
                    ]);
                }
            }

            /**
             * membuat pengunjung
             */
            for ($c = 0; $c < rand(2, 4); $c++){
                User::create([
                    'nama' => ($f = $faker->firstName).' '.($l = $faker->lastName),
                    'email' => strtolower($f).strtolower($l).++$counter.'@lapanganku.com',
                    'kecamatan_id' => $kecamatan->id,
                    'password' => bcrypt('secret'),
                    'role' => Role::PENGUNJUNG
                ]);
            }
        }
    }
}
