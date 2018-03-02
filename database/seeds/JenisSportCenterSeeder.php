<?php

use Illuminate\Database\Seeder;
use App\Jenis;
use App\SportCenter;

class JenisSportCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (SportCenter::all() as $sc){
            foreach (Jenis::all()->random(rand(1,3)) as $jenis){
                $sc->getJenis(true)->attach($jenis);
            }
        }
    }
}
