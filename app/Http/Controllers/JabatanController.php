<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\User;
use Illuminate\Http\Request;
use Gate;
use Brian2694\Toastr\Facades\Toastr;

class JabatanController extends Controller
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
        $jabatans = Jabatan::paginate(15);
        return view('jabatan.index',compact('jabatans'));
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
        return view('jabatan.create',compact('users'));
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
            'jabatan' => 'required',
        ]);
        $jabatan = new Jabatan();
        $jabatan -> user_id = $request -> nama_lengkap;
        $jabatan -> type_jabatan = $request -> jabatan;
        $jabatan -> save();
        // Toastr::success('jabatan successfully added!','Success');
        return redirect()->route('jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $jabatan = Jabatan::find($id);
        return view('jabatan.edit',compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'jabatan' => 'required',
        ]);
        $jabatan = Jabatan::find($id);
        $jabatan -> type_jabatan = $request -> jabatan;
        $jabatan -> save();
        // Toastr::success('jabatan successfully updated!','Updated');
        return redirect()->route('jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $jabatan = Jabatan::find($id);
        $jabatan -> delete();
        // Toastr::error('jabatan successfully deleted!','Deleted');
        return redirect()->route('jabatan');
    }
}