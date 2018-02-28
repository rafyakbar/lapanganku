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
     * mendapatkan data kecamatan
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

    /**
     * mendapatkan data kelurahan
     * @param bool $queryReturn
     * @return mixed
     */
    public function getKelurahan($queryReturn = false)
    {
        $all_id_kecamatan = $this->getKecamatan(true)->select('id')->get()->toArray();
        $all_id_kecamatan = array_flatten($all_id_kecamatan);
        $kelurahan = Kelurahan::whereIn('kecamatan_id', $all_id_kecamatan);
        if ($queryReturn)
            return $kelurahan;
        return $kelurahan->get();
    }

    /**
     * mendapatkan data SportCenter
     * @param bool $queryReturn
     * @return mixed
     */
    public function getSportCenter($queryReturn = false)
    {
        $all_id_kelurahan = $this->getKelurahan(true)->select('id')->get()->toArray();
        $all_id_kelurahan = array_flatten($all_id_kelurahan);
        $sportcenter = SportCenter::whereIn('kelurahan_id', $all_id_kelurahan);
        if ($queryReturn)
            return $sportcenter;
        return $sportcenter->get();
    }
    
}
