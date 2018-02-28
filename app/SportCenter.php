<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportCenter extends Model
{
    protected $table = 'sportcenter';

    protected $fillable = [
        'kecamatan_id', 'nama', 'dir', 'alamat', 'keterangan', 'created_at', 'updated_at'
    ];

    /**
     * mendapatkan data kecamatan
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getKecamatan($queryReturn = false)
    {
        $data = $this->belongsTo('App\Kecamatan', 'kecamatan_id');
        if ($queryReturn)
            return $data;
        return $data->first();
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
        $data = $this->hasMany('App\Lapangan', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan data jenis
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getJenis($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Jenis', 'jenis_sportcenter', 'sportcenter_id', 'jenis_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan data harga
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getHarga($queryReturn = false)
    {
        $data = $this->hasMany('App\Harga', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan data galeri
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getGaleri($queryReturn = false)
    {
        $data = $this->hasMany('App\Galeri', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan admin
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getAdmin($queryReturn = false)
    {
        $data = $this->hasMany('App\User', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan data member
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getMember($queryReturn = false)
    {
        $data = $this->belongsToMany('App\User', 'member', 'sportcenter_id', 'user_id')->withPivot('valid_bulan')->withTimestamps();
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan rating
     * @param bool $queryReturn
     * @return $this|\Illuminate\Database\Eloquent\Collection
     */
    public function getRating($queryReturn = false)
    {
        $data = $this->belongsToMany('App\User', 'member', 'sportcenter_id', 'user_id')->withPivot('bintang');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan feedback
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getFeedback($queryReturn = false)
    {
        $data = $this->belongsToMany('App\User', 'member', 'sportcenter_id', 'user_id')->withPivot('valid_bulan')->withTimestamps();
        if ($queryReturn)
            return $data;
        return $data->get();
    }
}