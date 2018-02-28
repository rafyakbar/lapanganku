<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id', 'kecamatan_id', 'nama'
    ];

    /**
     * mendapatkan data kecamatan
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getKecamatan($queryReturn = false)
    {
        $kecamatan = $this->belongsTo('App\Kecamatan', 'kecamatan_id');
        if ($queryReturn)
            return $kecamatan;
        return $kecamatan->first();
    }

    /**
     * mendapatkan data kabupaten
     * @param bool $queryReturn
     * @return mixed
     */
    public function getKabupaten($queryReturn = false)
    {
        return $this->getKecamatan()->getKabupaten($queryReturn);
    }

    /**
     * mendapatkan data provinsi
     * @param bool $queryReturn
     * @return mixed
     */
    public function getProvinsi($queryReturn = false)
    {
        return $this->getKabupaten()->getProvinsi($queryReturn);
    }

    /**
     * mendapatkan data sportcenter
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getSportCenter($queryReturn = false)
    {
        $sc = $this->hasMany('App\SportCenter', 'kelurahan_id');
        if ($queryReturn)
            return $sc;
        return $sc->get();
    }
}
