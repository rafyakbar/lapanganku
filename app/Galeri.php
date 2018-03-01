<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    public $timestamps = false;

    protected $fillable = [
        'sportcenter_id', 'dir', 'keterangan'
    ];

    /**
     * mendapatkan data sportcenter
     * @param bool $queryReturn
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|null|object|static
     */
    public function getSportCenter($queryReturn = false)
    {
        $data = $this->belongsTo('App\SportCenter', 'sportcenter_id');
        if ($queryReturn)
            return $data;
        return $data->first();
    }
}
