<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nik'                   => $row[2],
            'nama_lengkap'          => $row[3], 
            'nama_panggilan'        => $row[4], 
            'agama'                 => $row[5], 
            'jenis_kelamin'         => $row[6], 
            'tempat_tanggal_lahir'  => $row[7], 
            'no_hp'                 => $row[8], 
            'email'                 => $row[9],  
            'alamat_ktp'            => $row[10], 
            'alamat_domisili'       => $row[11],
            'jumlah_cuti'           => $row[12],
            'avatar'                => $row[13],
            'password'              => '',
        ]);
    }
}
