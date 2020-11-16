<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");

        $date = date("Y-m-d");
        $absen = DB::table('absen_karyawan')
                            ->join('karyawan', 'absen_karyawan.idkaryawan', '=', 'karyawan.id')
                            ->where('absen_karyawan.tanggal', '=', $date)
                            ->select('karyawan.*', 'absen_karyawan.waktu')
                            ->get();

        return view('home.dashboard', ['tanggal' => $date, 'absen' => $absen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function form()
    {

        $karyawan = DB::table('karyawan')->get();
        return view('home.formTambah')->with([
            'karyawan' => $karyawan
        ]);
    }

    public function karyawan(Request $request)
    {
        dump($request);
        $search = $request->cari;

        if($search == ''){
            $karyawan = DB::table('karyawan')
                             ->limit(5)->get();
         }else{
            $karyawan = DB::table('karyawan')
                             ->where('idkaryawan', 'like', '%' .$search . '%')
                             ->limit(5)->get();
         }

        $response = array();
        foreach($data as $karyawan){
           $response[] = array(
               "value" => $karyawan->id,
               "label" => $karyawan->nama,
               "divisi" => $karyawan->divisi,
               "jeniskelamin" => $karyawan->jeniskelamin
            );
        }
        return response()->json($response);
    }


    public function question()
    {
        return view('home.question');
    }
}
