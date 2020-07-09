<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'Cutis';
    protected $fillable = [
        'user_id',
        'type_cuti',
        'mulai_cuti',
        'selesai_cuti',
        'selama',
        'alasan'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved',true);
    }
}
