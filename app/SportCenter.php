<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportCenter extends Model
{
    protected $table = 'sportcenter';

    protected $fillable = [
        'kelurahan_id', 'nama', 'dir', 'alamat', 'keterangan', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan relasi atau data kelurahan
     * @param bool|null $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getKelurahan($queryReturn = false)
    {
        $kelurahan = $this->belongsTo('App\Kelurahan', 'kelurahan_id');
        if ($queryReturn)
            return $kelurahan;
        return $kelurahan->first();
    }

    /**
     * mendapatkan data Kecamatan
     * @param bool $queryReturn
     * @return mixed
     */
    public function getKecamatan($queryReturn = false)
    {
        return $this->getKelurahan()->getKecamatan($queryReturn);
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
     * mendapatkan data lapangan
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getLapangan($queryReturn = false)
    {
        $lapangan = $this->hasMany('App\Lapangan', 'sportcenter_id');
        if ($queryReturn)
            return $lapangan;
        return $lapangan->get();
    }

    /**
     * mendapatkan data jenis
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getJenis($queryReturn = false)
    {
        $jenis = $this->belongsToMany('App\Jenis', 'jenis_sportcenter', 'sportcenter_id', 'jenis_id');
        if ($queryReturn)
            return $jenis;
        return $jenis->get();
    }
}