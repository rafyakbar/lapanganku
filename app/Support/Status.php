<?php
/**
 * Created by PhpStorm.
 * User: Rafy
 * Date: 05/03/2018
 * Time: 18.51
 */

namespace App\Support;


class Status
{
    const BOOKING = 'BOOKING';

    const DP = 'DP';

    const LUNAS = 'LUNAS';

    const ALL = [
        self::BOOKING,
        self::DP,
        self::LUNAS
    ];
}