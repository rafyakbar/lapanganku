<?php

namespace App;

use App\Support\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sportcenter_id', 'kecamatan_id', 'saldo', 'role', 'helper', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * mendapatkan data sportcenter
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getSportCenter($queryReturn = false)
    {
        $data = $this->belongsTo('App\SportCenter', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->first();
    }

    /**
     * mendapatkan data sewa
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getSewa($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Lapangan', 'sewa', 'user_id', 'lapangan_id')->withPivot('harga', 'status','waktu', 'jam')->withTimestamps();
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
        $data = $this->belongsToMany('App\SportCenter', 'member', 'user_id', 'sportcenter_id')->withPivot('valid_bulan')->withTimestamps();
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * cek apakah user ini adalah root atau tidak
     * @return bool
     */
    public function isRoot()
    {
        return $this->role === Role::ROOT;
    }

    /**
     * cek apakah user ini adalah pemilik atau tidak
     * @return bool
     */
    public function isPemilik()
    {
        return $this->role === Role::PEMILIK;
    }

    /**
     * cek apakah user ini adalah pegawai atau tidak
     * @return bool
     */
    public function isPegawai()
    {
        return $this->role === Role::PEGAWAI;
    }

    /**
     * cek apakah user ini adalah pengunjung atau tidak
     * @return bool
     */
    public function isPengunjung()
    {
        return $this->role === Role::PENGUNJUNG;
    }
}
