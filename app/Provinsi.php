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

    /**
     * mendapatkan data kecamatan
     * @param bool $queryReturn
     * @return mixed
     */
    public function getKecamatan($queryReturn = false)
    {
        $all_kabupaten_id = $this->getKabupaten(true)->select('id')->get()->toArray();
        $all_kabupaten_id = array_flatten($all_kabupaten_id);
        $kecamatan = Kecamatan::whereIn('kabupaten_id', $all_kabupaten_id);
        if ($queryReturn)
            return $kecamatan;
        return $kecamatan->get();
    }
}
