<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama Lengkap',
            'Nama Panggilan',
            'Agama',
            'Jenis Kelamin',
            'Tempat Tgl Lahir',
            'No HP',
            'Email',
            'Jumlah Cuti',
            'Alamat KTP',
            'Alamat Domisili',
            'Gaji'
        ];
    }

    public function map($user): array
    {
        return [
            $user->nik,
            $user->nama_lengkap,
            $user->nama_panggilan,
            $user->agama,
            $user->jenis_kelamin,
            $user->tempat_tanggal_lahir,
            $user->no_hp,
            $user->email,
            $user->jumlah_cuti,
            $user->alamat_ktp,
            $user->alamat_domisili,
            $user->gaji,
        ];
    }
}
