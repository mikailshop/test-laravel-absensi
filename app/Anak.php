<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $fillable = ['user_id','nik_anak','nama_anak','tampat_tanggal_lahir','pendidikan','hubungan'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
