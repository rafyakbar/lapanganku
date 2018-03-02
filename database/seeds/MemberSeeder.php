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
            if (rand(0,1)){
                //merandom sportcenter
                foreach (SportCenter::all()->random(rand(1,3)) as $sc){
                    //mengisi tabel member (dari hasil many to many)
                    $user->getMember(true)->attach($sc, [
                        'valid_bulan' => 12
                    ]);
                }
            }
        }
    }
}
