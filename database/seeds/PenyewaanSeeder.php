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
        // mengambil user yang role nya PENGUNJUNG
        foreach (User::getPengunjung() as $user) {
            // mengambil sportcenter sesuai dengan kecamatan user
            foreach ($user->getKecamatan()->getSportCenter() as $sc) {
                // mngambil lapangan dari sportcenter
                foreach ($sc->getLapangan() as $l) {
                    $status = array_random(Status::ALL);
                    $wm = ($status == Status::BOOKING || $status == Status::DP) ? Carbon::today()->addDays(rand(0,2))->addHours(rand(7, 20))->addMinutes(rand(0, 59)) : Carbon::today()->addDays(rand(-300,0))->addHours(rand(7, 20))->addMinutes(rand(0, 59));
                    $ws = $wm->copy()->addHours(rand(1, 3));
                    // mengacak kembali jika telah ada yang menyewa (maks 100 acakan)
                    $counter = 0;
                    while (!$l->cekKetersediaan($wm->toDateTimeString(), $ws->toDateTimeString())) {
                        if ($counter == 100) break;
                        $status = array_random(Status::ALL);
                        $wm = ($status == Status::BOOKING || $status == Status::DP) ? Carbon::today()->addDays(rand(0,2))->addHours(rand(7, 20))->addMinutes(rand(0, 59)) : Carbon::today()->addDays(rand(-300,0))->addHours(rand(7, 20))->addMinutes(rand(0, 59));
                        $ws = $wm->copy()->addHours(rand(1, 3));
                        $counter++;
                    }
                    if ($counter < 100){
                        $user->getSewa(true)->attach($l, [
                            'harga' => $l->getHarga(true)->where('jam_awal', '<=', $wm->toTimeString())->where('jam_akhir', '>=', $wm->toTimeString())->first()->per_jam,
                            'status' => $status,
                            'waktu_mulai' => $wm->toDateTimeString(),
                            'waktu_selesai' => $ws->toDateTimeString(),
                            'registrasi' => ($ws->isSameMonth() && $ws->isSameYear()) ? false : true,
                            'created_at' => $wm->addHours(rand(3,20))->toDateTimeString()
                        ]);
                    }
                }
            }
        }
    }
}
