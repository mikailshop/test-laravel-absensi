<?php

namespace App\Http\Controllers;

use App\User;
use App\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CutiRequest;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if(Auth::user()->role=='superadmin') {
            $cutis = Cuti::paginate(5);
        }else{
            $cutis =  Auth::user()->cuti()->paginate(5);
        }
//        $user = Auth::user();
        return view('cuti.index',compact('cutis','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CutiRequest $request)
    {
        Cuti::create([
            'user_id'       => Auth::id(),
            'type_cuti'     => $request->type_cuti,
            'mulai_cuti'    => $request->mulai_cuti,
            'selesai_cuti'  => $request->selesai_cuti,
            'selama'        => $request->selama,
            'alasan'        => $request->alasan,
        ]);

        // Toastr::success('cuti successfully requested to HR!','Success');

        return redirect()->route('cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
//        dd($request->all());
           // $cuti = $request -> get('search');
            $cutis =Cuti::where('type_cuti', 'LIKE',"%{$request->search}%")->paginate();
            return view('cuti.index',compact('cutis'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request,$id)
    {

      //  dd($request->all());
        $cuti = Cuti::find($id);
        if($cuti){
            $cuti->is_approved = $request -> approve;
            $cuti->save();
            return redirect()->back();
        }
    }

    public function paid(Request $request,$id)
    {
        $cuti = Cuti::find($id);
        if($cuti){
            $cuti->penawaran_type_cuti = $request -> paid;
            $cuti->save();
            return redirect()->back();
        }
    }
}
