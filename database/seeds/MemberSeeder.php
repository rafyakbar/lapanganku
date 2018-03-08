<?php

use Illuminate\Database\Seeder;
use App\User;
use App\SportCenter;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::getPengunjung() as $user) {
            //untuk mengacak apakah user ini menjadi member atau tidak
            $r = rand(0,1);
            $r = ($r) ? $r : rand(0,1);
            $r = ($r) ? $r : rand(0,1);
            if ($r){
                //merandom sportcenter
                foreach ($user->getKecamatan()->getSportCenter() as $sc){
                    //mengisi tabel member (dari hasil many to many)
                    if (rand(0,1)){
                        $user->getMember(true)->attach($sc, [
                            'valid_bulan' => 12
                        ]);
                    }
                }
            }
        }
    }
}
