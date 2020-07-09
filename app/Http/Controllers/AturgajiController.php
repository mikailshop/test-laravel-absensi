<?php

namespace App\Http\Controllers;

use App\Aturgaji;
use App\User;
use App\Cuti;
use App\Jabatan;
use App\Uangmuka;
use App\Gaji;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AturgajiController extends Controller
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
        $users = User::all();
        return view('aturgaji.index',compact('users'));
    }

    public function detail(Request $request,$id)
    {
        $from = $request->input('startdate');
        $to = $request->input('enddate');
        if ( empty($to) && empty($from) ) {
            $advance = Uangmuka::where('user_id','=',$id)->get() ;
        } elseif ( empty($to) && ! empty($from) ) {
            $advance = Uangmuka::where('date', $from)->where('user_id','=',$id);
        } else {
            $advance = Uangmuka::whereBetween('date', [$from, $to])->where('user_id','=',$id)->get();
        }
        $jabatan = Jabatan::find($id);
        if(!$jabatan){
            return redirect('jabatan.create');
        }

//advance payment calculation
        $uangMuka = Uangmuka::where('user_id',$id)->select(DB::raw("SUM(jumlah) as total"))->first();
        $des = $jabatan -> type_jabatan;
        $user = User::find($id);
        $amt = $user->gaji;
        $nama_lengkap = $jabatan -> user->nama_lengkap;

//To count the leaves of the employee
//where('user_id',$id) -> user_id is from leaves db and $id is from detail(Request $request,$id)
        $total_cutis=Cuti::where('user_id',$id)->where('is_approved',1)->count();
        return view('aturgaji.detail',compact('amt','des','nama_lengkap','user','advance','uangMuka','total_cutis'));
    }

    public function salarylist()
    {
        $users = Aturgaji::all();
        return view('aturgaji.salarylist',compact('users'));
    }

    public function store(Request $request)
    {
        $users = new Aturgaji();
        $users -> nama_lengkap = $request -> nama_lengkap;
        $users -> type_jabatan = $request -> jabatan_user;
        $users -> hari_kerja = $request -> hari_kerja;
        $users -> pajak = $request -> pajak_deduction;
        $users -> gaji_bersih = $request -> gaji_bersih;
        $users -> save();
        return redirect()->route('aturgaji.salarylist');
    }

    public function makepayment()
    {
        return view('aturgaji.makepayment');
    }

    public function makeAdvance(Request $request)
    {
        $gajis = new Uangmuka();
        $gajis -> user_id = $request -> user_id;
        $gajis -> date = $request -> date;
        $gajis -> jumlah = $request -> jumlah;
        $gajis -> save();
        // Toastr::success('Advance payment successfully done!','Success');
//        \Session::flash('alert-success','New record created successfully');
        return redirect()->route('aturgaji.detail', $request->user_id)->with('msg','New record created successfully');
    }

    public function search(Request $request){
        $data =User::where('nama_lengkap', 'LIKE',"%{$request->search}%")->paginate();
        return redirect()->route('aturgaji.detail');
    }
}