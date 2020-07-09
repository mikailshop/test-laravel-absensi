<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Absensi;
use DateTime;
use App\User;
use App\Shift;
use App\Role;
use App\Telatmasuk;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Hash;
use App\View\Components\Alert;

class AbsenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_id = Auth::user()->id;
        return view('absen.index',compact('user_id'));
    }
    
    public function absenharian(Request $request)
    {
        $user_id = Auth::loginUsingId(1, true);
        $date = date("Y-m-d"); // 2017-02-01
        $time = date("H:i:s"); // 12:31:20
        $note = $request->note;
        // return $request->all();
        dd();
    }
    
        public function boot()
    {
        Blade::component('package-alert', Alert::class);
    }


        // Absen::create([
            // 'user_id' => $user_id,
            // 'date' => $date,
            // 'time_in' => $time,
            // 'note' => $note]);
    // absen keluar
        // Absen::where(['date' => $date, 'user_id' => $user_id])
        //     ->update([
        //         'time_out' => $time,
        //         'note' => $note]);
        // return redirect()->back();

        // return redirect()->route('absenharian');
    // }

    // public function assign(Request $request)
    // {
    //     $request->validated();

    //     if ($user = User::whereEmail(request('email'))->first()){

    //         if (Hash::check($request->pin_code, $user->pin_code)) {
    //                 if (!Absen::whereAbsen_date(date("Y-m-d"))->whereUser_id($user->id)->first()){
    //                     $absen = new Absen;
    //                     $absen->user_id = $user->id;
    //                     $absen->absen_time = date("H:i:s");
    //                     $absen->absen_date = date("Y-m-d");

    //                     if (!($user->shifts->first()->time_in >= $absen->absen_time)){
    //                         $absen->status = 0;
    //                     AbsenController::telatMasuk($user);
    //                     };
    //                     $absen->save();

    //                 }else{
    //                     return redirect()->route('absen.login')->with('error');
    //                 }
    //             } else {
    //             return redirect()->route('absen.login')->with<x-alert type="error" :message="$message"/>;
    //         }
    //     }



    //     return redirect()->route('home')->with('success');
    // }

    // /**
    //  * assign late time for attendace .
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public static function telatMasuk(User $user)
    // {
    //     $current_t= new DateTime(date("H:i:s"));
    //     $start_t= new DateTime($user->shifts->first()->time_in);
    //     $difference = $start_t->diff($current_t)->format('%H:%I:%S');


    //     $telatmasuk = new Telatmasuk;
    //     $telatmasuk->user_id = $user->id;
    //     $telatmasuk->duration   = $difference;
    //     $telatmasuk->telatmasuk_date  = date("Y-m-d");
    //     $telatmasuk->save();

    // }
}