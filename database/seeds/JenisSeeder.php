<?php

use Illuminate\Database\Seeder;
use App\Jenis;

class JenisSeeder extends Seeder
{
    const JENIS = [
        'Futsal',
        'Badminton',
        'Tenis Lapangan',
        'Tenis Meja',
        'Voli',
        'Basket',
        'Golf',
        'Hoki',
        'Bisbol'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::JENIS as $jenis){
            Jenis::create([
                'nama' => $jenis
            ]);
        }
    }
}
