<?php

namespace App;

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
        $data = $this->belongsToMany('App\Lapangan', 'sewa', 'user_id', 'lapangan_id')->withPivot('status','waktu', 'jam')->withTimestamps();
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
}
