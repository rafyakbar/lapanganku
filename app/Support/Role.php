<?php
/**
 * Created by PhpStorm.
 * User: PC-14
 * Date: 01/03/2018
 * Time: 19:12
 */

namespace App\Support;


class Role
{
    const ROOT = 'ROOT';

    const PEMILIK = 'PEMILIK';

    const PEGAWAI = 'PEGAWAI';

    const PENGUNJUNG = 'PENGUNJUNG';

    const ALL = [
        Role::ROOT,
        Role::PEMILIK,
        Role::PEGAWAI,
        Role::PENGUNJUNG
    ];

    /**
     * cek role
     * @param $role
     * @return bool
     */
    public static function check($role)
    {
        return in_array(strtolower($role), array_map('strtolower', Role::ALL));
    }
}