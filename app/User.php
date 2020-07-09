<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik','nama_lengkap','nama_panggilan','agama','jenis_kelamin',
        'tempat_tanggal_lahir','no_hp','email','jumlah_cuti','alamat_ktp',
        'alamat_domisili','avatar','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        return 'https://picsum.photos/160/160';
    }

    public function get_UserNumber(){

        $this->db->select("count(*) as no");
        $query = $this->db->get("users");
        return $query->result();

    }

    public function getAvatar() 
    {   
        if(!$this->avatar){
            return asset('images/default.jpg');
        }

        return asset('images/'.$this->avatar);
    }

    public function absen()
    {
        return $this->hasOne(Absen::class);
    }


    public function biodatas()
    {
        return $this->hasMany(Biodata::class);
    }
    
    public function pasangans()
    {
        return $this->hasMany(Pasangan::class);
    }

    public function department()
    {
        return $this->hasOne(Department::class);
    }

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class);
    }

    public function anaks() 
    {
        return $this->hasMany(Anak::class);
    }

    public function orangTuas() 
    {
        return $this->hasMany(OrangTua::class);
    }

    public function cuti() 
    {
        return $this->hasMany(Cuti::class);
    }
}