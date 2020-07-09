<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Biodata;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodatas = Biodata::paginate(15);
        return view('biodata.index',compact('biodatas'));
    }

    public function create()
    {
        $users = User::all();
        return view('biodata.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request -> validate([
        //     'biodata' => 'required',
        // ]);
        $biodata = new biodata();
        $biodata -> user_id = $request -> nama_lengkap;
        $biodata -> gol_darah = $request -> gol_darah;
        $biodata -> no_sim_a = $request -> no_sim_a;
        $biodata -> no_sim_c = $request -> no_sim_c;
        $biodata -> no_passport = $request -> no_passport;
        $biodata -> no_npwp = $request -> no_npwp;
        $biodata -> no_bpjs_tk = $request -> no_bpjs_tk;
        $biodata -> status_kepesertaan_tk = $request -> status_kepesertaan_tk;
        $biodata -> no_bpjs_kes = $request -> no_bpjs_kes;
        $biodata -> status_kepesertaan_kes = $request -> status_kepesertaan_kes;
        $biodata -> save();
        // Toastr::success('biodata successfully added!','Success');
        return redirect()->route('biodata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
