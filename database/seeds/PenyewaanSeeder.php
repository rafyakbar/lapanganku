<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Lapangan;
use App\SportCenter;
use App\Kecamatan;
use App\Support\Status;
use Carbon\Carbon;

class PenyewaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            foreach ($user->getKecamatan()->getSportCenter() as $sc) {
                foreach ($sc->getLapangan() as $l) {
                    if (rand(0,1)){
                        $status = array_random(Status::ALL);
                        $waktu = ($status == Status::BOOKING || $status == Status::DP) ? Carbon::tomorrow()->addHours(rand(8,21))->addMinutes(rand(0,59)) : Carbon::yesterday()->addHours(rand(8,21))->addMinutes(rand(0,59));
                        $user->getSewa(true)->attach($l, [
                            'harga' => $l->getHarga(true)->where('jam_awal', '<=', now()->toTimeString())->where('jam_akhir', '>=', now()->toTimeString())->first()->per_jam,
                            'status' => $status,
                            'waktu_mulai' => $waktu->toDateTimeString(),
                            'waktu_selesai' => $waktu->addHours(rand(1,3))->toDateTimeString(),
                            'registrasi' => false
                        ]);
                    }
                }
            }
        }
    }
}
