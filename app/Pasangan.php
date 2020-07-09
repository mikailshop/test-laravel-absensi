<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    protected $fillable = ['user_id','status_pernikahan','nik_pasangan','nama_pasangan','pekerjaan','no_handphone', 'no_whatsapp'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
