<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('ProvinsiSeeder');
        $this->call('KabupatenSeeder');
        $this->call('KecamatanSeeder');
        $this->call('JenisSeeder');
        $this->call('UserSportCenterSeeder');
        $this->call('MemberSeeder');
        $this->call('JenisSportCenterSeeder');
        $this->call('HargaLapanganSeeder');
        $this->call('MemberLapanganSeeder');
        $this->call('PenyewaanSeeder');
    }
}
