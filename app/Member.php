<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $fillable = [
        'sportcenter_id', 'user_id', 'valid_bulan', 'created_at', 'updated_at'
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
     * mendapatkan data user
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getUser($queryReturn = false)
    {
        $data = $this->belongsTo('App\User', 'user_id');
        if ($queryReturn)
            return $data;
        return $data->first();
    }

    public function getLapangan($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Lapangan', 'member_lapangan', 'member_id', 'lapangan_id')->withPivot('jumlah_bulan', 'harga','waktu_mulai', 'waktu_selesai','hari');
        if ($queryReturn)
            return $data;
        return $data->get();
    }
}
