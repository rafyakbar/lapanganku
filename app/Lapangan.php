<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'lapangan';

    public $timestamps = false;

    protected $fillable = [
        'sportcenter_id', 'jenis_id', 'harga_id'
    ];


    /**
     * mendapatkan datasportcenter
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getSportCenter($queryReturn = false)
    {
        $sportcenter = $this->belongsTo('App\SportCenter', 'sportcenter_id');
        if ($queryReturn)
            return $sportcenter;
        return $sportcenter->first();
    }

    /**
     * mendapatkan data harga
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getHarga($queryReturn = false)
    {
        $harga = $this->belongsTo('App\Harga', 'harga_id');
        if ($queryReturn)
            return $harga;
        return $harga->first();
    }

    /**
     * mendapatkan data jenis
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getJenis($queryReturn = false)
    {
        $data = $this->belongsTo('App\Jenis', 'jenis_id');
        if ($queryReturn)
            return $data;
        return $data->first();
    }

    /**
     * mendapatkan data member
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getMember($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Member', 'member_lapangan', 'lapangan_id', 'member_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan data sewa
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getSewa($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Sewa', 'sewa', 'lapangan_id', 'user_id')->withPivot('status', 'waktu', 'jam')->withTimestamps();
        if ($queryReturn)
            return $data;
        return $data->get();
    }
}
