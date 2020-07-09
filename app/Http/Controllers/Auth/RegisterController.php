<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
            'nik' => ['required', 'string', 'nik', 'max:255', 'unique:users'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nama_panggilan' => ['required', 'string', 'max:255'],
            'agama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'tempat_tanggal_lahir' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string','no_hp', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'jumlah_cuti'=> [],
            'alamat_ktp' => ['required', 'string', 'max:255'],
            'alamat_domisili' => ['required', 'string', 'max:255'],
            'avatar' => [],
            'gaji' => [],
            'role' => [],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nik' => $data['nik'],
            'nama_lengkap' => $data['nama_lengkap'],
            'nama_panggilan' => $data['nama_panggilan'],
            'agama' => $data['agama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_tanggal_lahir' => $data['jenis_kelamin'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'jumlah_cuti'=> $data['jumlah_cuti'],
            'alamat_ktp' => $data['alamat_ktp'],
            'alamat_domisili' => $data['alamat_domisili'],
            'avatar' => $data['avatar'],
            'gaji' => $data['gaji'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
