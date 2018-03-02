<?php

use Illuminate\Database\Seeder;
use App\SportCenter;
use App\Harga;
use App\Jenis;
use App\Lapangan;
use Carbon\Carbon;

class HargaLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (SportCenter::all() as $sc){
            foreach ($sc->getJenis() as $jenis){
                Harga::create([
                    'per_jam' => rand(50,100) * 1000,
                    'jam_awal' => Carbon::today()->addHours(7)

                ]);
            }
        }
    }
}
