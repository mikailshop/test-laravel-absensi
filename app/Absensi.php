<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absens';
    protected $fillable = ['user_id', 'date', 'time_in', 'time_out', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
