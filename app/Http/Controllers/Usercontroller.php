<?php

namespace App\Http\Controllers;

use App\OrangTua;
use App\User;
use App\Anak;
use App\Biodata;
use App\Jabatan;
use App\Department;
use App\Gaji;
use App\Pasangan;
use Dotenv\Store\File\Reader;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount(['cuti', 'cuti as approve_jumlah_cuti' => function($query){
            
            $query->where('is_approved',true);
            
        }])->paginate(10);

        $user = DB::table('users')
        ->leftJoin('department', 'users.department_id', '=', 'department.id')
        ->leftJoin('jabatan', 'users.jabatan_id', '=', 'jabatan.id')
        ->select('users.*', 'nama_department as nama_department', 'department.id as department_id', 'type.jabatan as type_jabatan', 'jabatan.id as jabatan_id');

        $departments = Department::all();
        $jabatans = Jabatan::all();
        $gajis = Gaji::all();

        return view('user.index',compact('users', 'jabatans', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('user.create', [
            'users' => $users,
        ]);
    }

    public function exportXls() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    
    public function exportPdf() 
    {
        $users = User::all();
        $pdf = PDF::loadView('user.exportpdf', compact('users'));
        return $pdf->download('users.pdf');
    }
    
    public function importXls(Request $request)
    {
        $this->validate($request, [
            'import_file' => 'required|mimes:xls, xlsx'
        ]);

        $path = $request->file('import_file')->getRealPath();        
        $data = Excel::load($path)->get();

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
        // $users = Excel::import(new UsersImport, $request->file('import_file'));
        // foreach ($users[0] as $user) {
        //     User::where('id', $user[0])->update([
        //         'nik'                   => $user[1],
        //         'nama_lengkap'          => $user[2], 
        //         'nama_panggilan'        => $user[3], 
        //         'agama'                 => $user[4], 
        //         'jenis_kelamin'         => $user[5], 
        //         'tempat_tanggal_lahir'  => $user[6], 
        //         'no_hp'                 => $user[7], 
        //         'email'                 => $user[8], 
        //         'alamat_ktp'            => $user[9], 
        //         'alamat_domisili'       => $user[10],
        //         'jumlah_cuti'           => $user[11],
        //         'avatar'                => $user[12],
        //     ]);
        // }
        return redirect('user')->with('success', 'All good!');
    }

    public function importPdf(Request $request)
    {
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $request -> validate([
    //         'nik' => 'required',
    //         'nama_lengkap' => 'required',
    //         'no_hp' => 'required',
    //         'email' => 'required',
    //         'alamat_domisili' => 'required',
    //                                                                     //  'password' => 'required',
    //                                                                     //  'status' => 'required',

    // ]);
        $user = new User();
        $user -> nik = $request -> nik;
        $user -> nama_lengkap = $request -> nama_lengkap;
        $user -> nama_panggilan = $request -> nama_panggilan;
        $user -> agama = $request -> agama;
        $user -> jenis_kelamin = $request -> jenis_kelamin;
        $user -> tempat_tanggal_lahir = $request -> tempat_tanggal_lahir;
        $user -> no_hp = $request -> no_hp;
        $user -> email = $request -> email;
        $user -> alamat_ktp = $request -> alamat_ktp;
        $user -> alamat_domisili = $request -> alamat_domisili;
        $user -> jumlah_cuti = $request -> jumlah_cuti;
        $user -> avatar = $request -> avatar;
        $user -> password = bcrypt($request -> password);
        // if($request->hasfile('avatar')){
        //     $file = $request->file('avatar');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file -> move('images/', $filename);
        //     $user->avatar = $filename;
        // }else{
        //     $user->avatar = 'images/default.jpg';
        // }
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
            $user->save();
        }
        // return redirect('user')->with('sukses', 'Data berhasil diinput');

        $user -> save();
        session()->flash('success', 'Data baru berhasil dimmasukkan');
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $biodatas = $user->biodatas;
        $pasangans = $user->pasangans;
        $anaks = $user->anaks;
        $orangTuas = $user->orangTuas;
        return view('user.edit', [
            'user' => $user,
            'biodatas' => $biodatas,
            'pasangans' => $pasangans,
            'anaks' => $anaks,
            'orangTuas' => $orangTuas,
        ]);
    }

    public function update(Request $request, $id)
    {
        // $request -> validate([
        //     'nik' => 'required',
        //     'nama_lengkap' => 'required',
        //     'no_hp' => 'required',
        //     'email' => 'required',
        //     'alamat_domisili' => 'required',
        //                                                                 //  'password' => 'required',
        //                                                                 //  'status' => 'required',
        // ]);
        $user = User::find($id);
        $user -> nik = $request -> nik;
        $user -> nama_lengkap = $request -> nama_lengkap;
        $user -> nama_panggilan = $request -> nama_panggilan;
        $user -> agama = $request -> agama;
        $user -> jenis_kelamin = $request -> jenis_kelamin;
        $user -> tempat_tanggal_lahir = $request -> tempat_tanggal_lahir;
        $user -> no_hp = $request -> no_hp;
        $user -> email = $request -> email;
        $user -> alamat_ktp = $request -> alamat_ktp;
        $user -> alamat_domisili = $request -> alamat_domisili;
        $user -> jumlah_cuti = $request -> jumlah_cuti;
        $user -> avatar = $request -> avatar;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('images/', $filename);
            $user->avatar = $filename;
        }else{
            $user->avatar = '';
        }
                                                                        //  $user -> avatar = $request -> avatar;
                                                                        //  $user -> password = $request -> password;
                                                                        //  $user -> password = bcrypt($request -> password);
                                                                        //  $user -> status = $request -> status;
                                                                        //  dd($user);
                                                                        //  $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect()->route('user');
    }

    public function search(Request $request){
        $users =User::where('nama_lengkap', 'LIKE',"%{$request->search}%")->paginate();
        return view('user.index',compact('users'));
    }

    public function profile($id)
    {
        $user = User::find($id);

        $jabatans = $user->jabatans;
        $biodatas = $user->biodatas;
        $pasangans = $user->pasangans;
        $anaks = $user->anaks;
        $orangtuas = $user->orangtuas;
        return view('user.profile', [
            'user' => $user,
            'jabatans' => $jabatans,
            'biodatas' => $biodatas,
            'pasangans' => $pasangans,
            'anaks' => $anaks,
            'orangtuas' => $orangtuas,
        ]);
    }
}
