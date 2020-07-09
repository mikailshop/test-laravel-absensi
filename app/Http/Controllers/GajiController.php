<?php

namespace App\Http\Controllers;

// use Brian2694\Toastr\Facades\Toastr;
use App\User;
// use Gate;
use App\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Illuminate\Support\Facades\Auth;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $gajis = Gaji::paginate(15);
//        $users = User::all();
        return view('gaji.index',compact('gajis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }

        $users = User::all();
        return view('gaji.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'jumlah_gaji' => 'required',
        ]);
        $gaji = new Gaji();
        $gaji -> user_id = $request -> nama_lengkap;
        $gaji -> jumlah_gaji = $request -> jumlah_gaji;
        $gaji -> save();
        // Toastr::success('Gaji successfully added!','Success');
        return redirect()->route('gaji');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $gaji = Gaji::find($id);
        return view('gaji.edit',compact('gaji'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'jumlah_gaji' => 'required',
        ]);
        $gaji = Gaji::find($id);
        $gaji -> jumlah_gaji = $request -> jumlah_gaji;
        $gaji -> save();
        // Toastr::success('Gaji successfully updated!','Success');
        return redirect()->route('gaji');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $gaji = Gaji::find($id);
        $gaji -> delete();
        // Toastr::error('Gaji successfully deleted!','Deleted');
        return redirect()->route('gaji');
    }
}
