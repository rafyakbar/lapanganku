<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'harga';

    protected $fillable = [
        'sportcenter_id', 'per_jam', 'jam_awal', 'jam_akhir', 'hari'
    ];

    /**
     * mendapatkan data sportcenter
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getSportCenter($queryReturn = false)
    {
        $data = $this->belongsTo('App\SportCenter', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->first();
    }

    /**
     * mendapatkan data lapangan
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getLapangan($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Lapangan', 'harga_lapangan', 'harga_id', 'lapangan_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }
}
