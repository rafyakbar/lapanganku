<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';

    public $timestamps = false;

    protected $fillable = [
        'nama'
    ];

    /**
     * mendapatkan data sportcenter
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getSportCenter($queryReturn = false)
    {
        $data = $this->belongsToMany('App\SportCenter', 'jenis_sportcenter', 'jenis_id', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan lapangan
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getLapangan($queryReturn = false)
    {
        $data = $this->hasMany('App\Lapangan', 'jenis_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }
}
