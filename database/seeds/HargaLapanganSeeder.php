<?php

use Illuminate\Database\Seeder;
use App\SportCenter;
use App\Harga;
use App\Jenis;
use App\Lapangan;
use Carbon\Carbon;
use App\Support\Hari;

class HargaLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //mengambil semua data sportcenter
        foreach (SportCenter::all() as $sc){
            //mengambil data jenis per sportcenter
            foreach ($sc->getJenis() as $jenis){
                //membuat harga
                $harga_pagi = Harga::create([
                    'per_jam' => rand(50,75) * 1000,
                    'jam_awal' => Carbon::today()->addHours(6),
                    'jam_akhir' => Carbon::today()->addHours(16),
                    'hari' => implode(';', $h = collect(Hari::ALL)->random(5)->toArray()),
                    'sportcenter_id' => $sc->id,
                    'keterangan' => 'Harga lapangan '.$jenis->nama.' pagi'
                ]);
                $harga_malam = Harga::create([
                    'per_jam' => rand(80,150) * 1000,
                    'jam_awal' => Carbon::today()->addHours(16),
                    'jam_akhir' => Carbon::today()->addHours(23),
                    'hari' => implode(';', collect(Hari::ALL)->diff($h)->toArray()),
                    'sportcenter_id' => $sc->id,
                    'keterangan' => 'Harga lapangan '.$jenis->nama.' malam'
                ]);
                //membuat lapangan per jenis sportcenter
                for ($c = 0; $c < rand(1,3); $c++){
                    $lapangan = Lapangan::create([
                        'sportcenter_id' => $sc->id,
                        'jenis_id' => $jenis->id,
                        'keterangan' => 'Lapangan '.$jenis->nama.' nomor '.($c + 1)
                    ]);
                    $lapangan->getHarga(true)->attach($harga_pagi);
                    $lapangan->getHarga(true)->attach($harga_malam);
                }
            }
        }
    }
}
