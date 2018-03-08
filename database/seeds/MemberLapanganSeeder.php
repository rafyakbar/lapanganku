<?php

use Illuminate\Database\Seeder;
use App\SportCenter;
use App\Member;
use Carbon\Carbon;
use App\Support\Hari;

class MemberLapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (SportCenter::all() as $sc){
            foreach ($sc->getMember() as $user){
                $lapangan = $sc->getLapangan()->random();
                $jumbulan = rand(5,8);
                $waktu = Carbon::parse($user->pivot->created_at)->addDays(rand(1,7))->addHours(rand(6,20));
                $mulai = Carbon::today()->addHours(rand(6,18));
                $hari = implode(';', collect(Hari::ALL)->diff(explode(';', $sc->hari_libur))->random($jumhari = rand(2,3))->toArray());
                Member::find($user->pivot->id)->getLapangan(true)->attach($lapangan, [
                    'jumlah_bulan' => $jumbulan,
                    'harga' => rand(60,90) * 1000 * $jumbulan * $jumhari * 4,
                    'waktu_mulai' => $mulai->toTimeString(),
                    'waktu_selesai' => $mulai->addHours(rand(1,3))->toTimeString(),
                    'hari' => $hari,
                    'created_at' => $waktu->toDateTimeString()
                ]);
            }
        }
    }
}
