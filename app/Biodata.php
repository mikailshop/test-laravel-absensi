<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = ['user_id','gol_darah','no_sim_a','no_sim_c', 'no_passport', 'no_npwp', 'no_bpjs_tk', 'status_kepesertaan_tk',  'no_bpjs_kes', 'status_kepesertaan_kes'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
