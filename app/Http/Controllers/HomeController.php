<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\absen;
use DataTables;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
     return view('login');
    }

    public function masuk(Request $request)
    {
        // dd($request->all());



        $data = DB::table('users')
                        ->where('email', '=', $request->inputEmail)
                        ->select('email','password')
                        ->get();

        $email = 'NULL';
        $password = 'NULL';
        $emailverif = $request->inputEmail;

        foreach($data as $data){
              $email = $data->email;
              $password = $data->password;
        };

        if($emailverif == $email)
        {
            $hash = $request->inputPassword;

                if(Hash::check($hash, $password))
                {
                    $date = date("Y-m-d");
                    session(['login' => true]);
                    return redirect('/dashboard'.'/'.$date);
                }
            return redirect('/')->with('message', 'Email atau Password salah');
        }
        return redirect('/')->with('message', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function index($tanggal)
    {

        $date = $tanggal;
        $date1 = date("Y-m-d",strtotime("-1 days"));
        $date2 = date("Y-m-d",strtotime("-2 days"));
        $date3 = date("Y-m-d",strtotime("-3 days"));
        $date4 = date("Y-m-d",strtotime("-4 days"));

        $absen = DB::table('absen_karyawan')
                            ->join('karyawan', 'absen_karyawan.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->where('absen_karyawan.tanggal', '=', $date)
                            ->select('karyawan.*', 'absen_karyawan.waktu', 'absen_karyawan.status')
                            ->get();

        $count = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date)
                            ->count();

        $countkaryawan = DB::table('karyawan')
                            ->count();

        $countbekerja = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date)
                            ->where('absen_karyawan.status', '=', 'Bekerja')
                            ->count();

        $countbekerja1 = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date1)
                            ->where('absen_karyawan.status', '=', 'Bekerja')
                            ->count();

        $countbekerja2 = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date2)
                            ->where('absen_karyawan.status', '=', 'Bekerja')
                            ->count();

        $countbekerja3 = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date3)
                            ->where('absen_karyawan.status', '=', 'Bekerja')
                            ->count();

        $countbekerja4 = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date4)
                            ->where('absen_karyawan.status', '=', 'Bekerja')
                            ->count();

        if($countbekerja == 0){
            $persen = 0;
        }
        else{
           $persen = $countbekerja/$countkaryawan*100;
        }

        $persen = number_format($persen, 1, '.', '');

        // $formatted_date = $tanggal->format('l, d F Y'); // 2003-10-16

        // if(session('login'))
        // {

            return view('home.dashboard', [ 'absen' => $absen,
                                        'persen' => $persen,
                                        'countkaryawan' => $countkaryawan,
                                        'countbekerja' => $countbekerja,
                                        'countbekerja1' => $countbekerja1,
                                        'countbekerja2' => $countbekerja2,
                                        'countbekerja3' => $countbekerja3,
                                        'countbekerja4' => $countbekerja4,
                                        'tanggal' => $date
                                        ]);
        // }
        // {
        //     return redirect('/');
        // }
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

        $date = date("Y-m-d");
        return redirect('/dashboard'.'/'.$date);
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

        if($search == ' '){
            $karyawan = DB::table('karyawan')
                             ->select('id', 'idkaryawan', 'namadepan', 'namabelakang', 'divisi', 'jeniskelamin')
                             ->get();

         }else{
            $karyawan = DB::table('sertifikat')
                             ->rightJoin('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                             ->select("karyawan.*", 'sertifikat.namasertifikat', 'sertifikat.tanggalkadaluarsa')
                             ->where('karyawan.idkaryawan', 'like', '%' . $search . '%')
                            //  ->where('karyawan.idkaryawan', '=', 'sertifikat.idkaryawan')
                             ->get();
         }

        $response = array();
        foreach($karyawan as $karyawan){
            if($karyawan->tanggalkadaluarsa == NULL)
            {
                $tanggalkadaluarsa = ' ';
            }
            else
            {
                $tanggalkadaluarsa = date('d F Y', strtotime($karyawan->tanggalkadaluarsa));
            }
           $response[] = array(
               "value" => $karyawan->id,
               "label" => $karyawan->idkaryawan,
               "nama" => $karyawan->namadepan,
               "namabelakang" => $karyawan->namabelakang,
               "divisi" => $karyawan->divisi,
               "jeniskelamin" => $karyawan->jeniskelamin,
               "namasertifikat" => $karyawan->namasertifikat,
              "tanggalkadaluarsa" => $tanggalkadaluarsa,

            );
        }
        return response()->json($response);
    }


    public function question()
    {
        return view('home.question');
    }

    public function sertifikat()
    {

        $sertifikat = DB::table('sertifikat')
                            ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->select('karyawan.*', 'sertifikat.*')
                            ->get();

        return view('sertifikasi', ['sertifikat' => $sertifikat]);
    }

}
