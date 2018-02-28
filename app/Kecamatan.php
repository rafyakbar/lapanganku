<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $keyType = 'string';

    public $timestamps = 'false';

    protected $fillable = [
      'id', 'kabupaten_id', 'nama'
    ];

    /**
     * mendapatkan data kabupaten
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getKabupaten($queryReturn = false)
    {
        $kabupaten = $this->belongsTo('App\Kabupaten', 'kabupaten_id');
        if ($queryReturn)
            return $kabupaten;
        return $kabupaten->first();
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
     * mendapatkan data kelurahan
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getKelurahan($queryReturn = false)
    {
        $kelurahan = $this->hasMany('App\Kelurahan', 'kecamatan_id');
        if ($queryReturn)
            return $kelurahan;
        return $kelurahan->get();
    }

}