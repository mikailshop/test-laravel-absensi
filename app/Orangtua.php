<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $table = "orang_tuas";
    protected $fillable = ['user_id','nik_orangtua','nama_lengkap','pekerjaan','no_hp','hubungan'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
        //return users::where('user_id', $this->id)->first()->no_hp;
    }
}
