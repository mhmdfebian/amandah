<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\absen;
use DataTables;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $date = date("Y-m-d");
        $absen = DB::table('absen_karyawan')
                            ->join('karyawan', 'absen_karyawan.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->where('absen_karyawan.tanggal', '=', $date)
                            ->select('karyawan.*', 'absen_karyawan.waktu', 'absen_karyawan.status')
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

        DB::table('absen_karyawan')->insert(
            ['idkaryawan' => $request->idkaryawan,
             'status' => $request->status,
             'tanggal' => $request->tanggal,
             'waktu' => $request->waktu,
            ]
        );

        return redirect('/');
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
        return view('home.formTambah', ['karyawan' => $karyawan]);
    }

    public function karyawan(Request $request)
    {
        $search = $request->cari;

        if($search == ''){
            $karyawan = DB::table('karyawan')
                             ->select('id', 'idkaryawan', 'namadepan', 'namabelakang', 'divisi', 'jeniskelamin')
                             ->limit(5)->get();

         }else{
            $karyawan = DB::table('karyawan')
                             ->select('id', 'idkaryawan', 'namadepan', 'namabelakang', 'divisi', 'jeniskelamin')
                             ->where('idkaryawan', 'like', '%' . $search . '%')
                             ->limit(5)->get();
         }

        $response = array();
        foreach($karyawan as $karyawan){
           $response[] = array(
               "value" => $karyawan->id,
               "label" => $karyawan->idkaryawan,
               "nama" => $karyawan->namadepan,
               "namabelakang" => $karyawan->namabelakang,
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
