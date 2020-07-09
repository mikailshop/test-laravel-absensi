<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->orderByDesc('id')->get();
        return view('import_excel', compact('data'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();
        $data = Excel::import($path);
        if($data->count() > 0) 
        {
            foreach($data->toArray() as $key => $value) 
            {
                foreach($value as $row) 
                {
                    $insert_data[] = array(
                        'nik'                   => $row['nik'],
                        'nama_lengkap'          => $row['nama_lengkap'], 
                        'nama_panggilan'        => $row['nama_panggilan'], 
                        'agama'                 => $row['agama'], 
                        'jenis_kelamin'         => $row['jenis_kelamin'], 
                        'tempat_tanggal_lahir'  => $row['tempat_tanggal_lahir'], 
                        'no_hp'                 => $row['no_hp'], 
                        'email'                 => $row['email'],  
                        'alamat_ktp'            => $row['alamat_ktp'], 
                        'alamat_domisili'       => $row['alamat_domisili'],
                        'jumlah_cuti'           => $row['jumlah_cuti'],
                        'avatar'                => $row['avatar'],
                        'password'              => '',
                    );
                }
            }

            if(!empty($insert_data))
            {
                DB::table('users')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported success');
    }
}
