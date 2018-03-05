<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

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
        $data = $this->belongsTo('App\Kabupaten', 'kabupaten_id');
        if ($queryReturn)
            return $data;
        return $data->first();
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
        $data = $this->hasMany('App\SportCenter', 'kecamatan_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }



}
