<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';

    protected $keyType = 'string';

    public $timestamps = 'false';

    protected $fillable = [
        'id', 'provinsi_id', 'nama'
    ];


    /**
     * mendapatkan data provinsi
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getProvinsi($queryReturn = false)
    {
        $provinsi= $this->belongsTo('App\Provinsi', 'provinsi_id');
        if ($queryReturn)
            return $provinsi;
        return $provinsi->first();
    }

    /**
     * mendapatkan kecamatan
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getKecamatan($queryReturn = false)
    {
        $kecamatan = $this->hasMany('App\Kecamatan', 'kabupaten_id');
        if ($queryReturn)
            return $kecamatan;
        return $kecamatan->get();
    }
    
}
