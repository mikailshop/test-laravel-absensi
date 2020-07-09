<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function scopeAdvance($query)
    {
        return $query->where('jumlah_gaji',true);
    }
}
