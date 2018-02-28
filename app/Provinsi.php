<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';

    protected $keyType = 'string';

    public $timestamps = 'false';

    protected $fillable = [
        'id', 'nama'
    ];

    /**
     * mendapatkan datakabupaten
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getKabupaten($queryReturn = false)
    {
        $kabupaten = $this->hasMany('App\Kabupaten', 'provinsi_id');
        if ($queryReturn)
            return $kabupaten;
        return $kabupaten->get();
    }
}
