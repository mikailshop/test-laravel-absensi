<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aturgaji extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function advanceSum()
    {
        return $this->hasMany('App\Uangmuka')
            ->selectRaw('SUM(jumlah) as total')
            ->groupBy('user_id');
    }
}
