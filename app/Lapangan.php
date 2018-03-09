<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'lapangan';

    public $timestamps = false;

    protected $fillable = [
        'sportcenter_id', 'jenis_id', 'keterangan'
    ];


    /**
     * mendapatkan datasportcenter
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getSportCenter($queryReturn = false)
    {
        $sportcenter = $this->belongsTo('App\SportCenter', 'sportcenter_id');
        if ($queryReturn)
            return $sportcenter;
        return $sportcenter->first();
    }

    /**
     * mendapatkan data harga
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getHarga($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Harga', 'harga_lapangan', 'lapangan_id', 'harga_id');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan data jenis
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getJenis($queryReturn = false)
    {
        $data = $this->belongsTo('App\Jenis', 'jenis_id');
        if ($queryReturn)
            return $data;
        return $data->first();
    }

    /**
     * mendapatkan data member
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getMember($queryReturn = false)
    {
        $data = $this->belongsToMany('App\Member', 'member_lapangan', 'lapangan_id', 'member_id')->withPivot('jumlah_bulan', 'harga','waktu_mulai', 'waktu_selesai','hari');
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mendapatkan data sewa
     * @param bool $queryReturn
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getSewa($queryReturn = false)
    {
        $data = $this->belongsToMany('App\User', 'sewa', 'lapangan_id', 'user_id')->withPivot('harga', 'status', 'waktu_mulai', 'waktu_selesai','registrasi')->withTimestamps();
        if ($queryReturn)
            return $data;
        return $data->get();
    }

    /**
     * mengecek ketersediaan lapangan
     * @param string $waktuMulai
     * @param string $waktuSelesai
     * @return bool
     */
    public function cekKetersediaan(string $waktuMulai, string $waktuSelesai)
    {
        $wm = Carbon::parse($waktuMulai);
        $ws = Carbon::parse($waktuSelesai);
        $sewa = $this->getSewa(true)
            ->whereRaw("((waktu_mulai <= '".$waktuMulai."' AND waktu_selesai > '".$waktuMulai."')")
            ->orWhereRaw("(waktu_mulai < '".$waktuSelesai."' AND waktu_selesai >= '".$waktuSelesai."'))")
            ->count();
        $memberlapangan = $this->getMember(true)
            ->whereRaw("hari LIKE '%".$wm->format('l')."%'")
            ->whereRaw("((waktu_mulai <= '".$wm->toTimeString()."' AND waktu_selesai > '".$wm->toTimeString()."')")
            ->orWhereRaw("(waktu_mulai < '".$ws->toTimeString()."' AND waktu_selesai >= '".$ws->toTimeString()."'))")
            ->count();
        return $sewa == 0 && $memberlapangan == 0;
    }
}
