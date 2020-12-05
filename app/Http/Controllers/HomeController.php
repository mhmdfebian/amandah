<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendEmail as SendEmail;


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
                    return redirect('/sendEmail');
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
        $date0 = date("Y-m-d");
        $date1 = date("Y-m-d",strtotime("-1 days"));
        $date2 = date("Y-m-d",strtotime("-2 days"));
        $date3 = date("Y-m-d",strtotime("-3 days"));
        $date4 = date("Y-m-d",strtotime("-4 days"));

        $absen = DB::table('absen_karyawan')
                            ->join('karyawan', 'absen_karyawan.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->where('absen_karyawan.tanggal', '=', $date)
                            ->select('karyawan.namadepan', 'karyawan.namabelakang', 'karyawan.idkaryawan', 'karyawan.jeniskelamin', 'karyawan.divisi', 'absen_karyawan.waktu', 'absen_karyawan.status', 'absen_karyawan.id')
                            ->get();

        $count = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date)
                            ->count();

        $countkaryawan = DB::table('karyawan')
                            ->count();

        $countbekerja = DB::table('absen_karyawan')
                            ->where('absen_karyawan.tanggal', '=', $date0)
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

        // $details['email'] = 'daffapm20@gmail.com';
        // SendEmail::dispatch($details);
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

    public function sendEmail()
    {
        $date = date("Y-m-d");
        $date10 = date("Y-m-d",strtotime("10 days"));

        $sertifikat = DB::table('sertifikat')
                            ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->where('sertifikat.tanggalkadaluarsa', '=', $date10)
                            ->select('karyawan.*','sertifikat.tanggalkadaluarsa','sertifikat.namasertifikat')
                            ->get();

        $sertifikatnow = DB::table('sertifikat')
                            ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->where('sertifikat.tanggalkadaluarsa', '=', $date)
                            ->select('karyawan.*','sertifikat.tanggalkadaluarsa','sertifikat.namasertifikat')
                            ->get();

        if (DB::table('sertifikat')
        ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
        ->where('sertifikat.tanggalkadaluarsa', '=', $date10)->exists()){

            foreach ($sertifikat as $sendEmail) {
                $details['namadepan'] = $sendEmail->namadepan;
                $details['namabelakang'] = $sendEmail->namabelakang;
                $details['tanggalkadaluarsa'] = $sendEmail->tanggalkadaluarsa;
                $details['namasertifikat'] = $sendEmail->namasertifikat;
                $details['email'] = $sendEmail->email;
                // SendEmail::dispatch($details);
            }
        }

        if (DB::table('sertifikat')
        ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
        ->where('sertifikat.tanggalkadaluarsa', '=', $date)->exists()){
            foreach ($sertifikatnow as $sendEmailnow) {
                $details['namadepan'] = $sendEmailnow->namadepan;
                $details['namabelakang'] = $sendEmailnow->namabelakang;
                $details['namasertifikat'] = $sendEmailnow->namasertifikat;
                $details['tanggalkadaluarsa'] = $sendEmailnow->tanggalkadaluarsa;
                $details['email'] = $sendEmailnow->email;
                // SendEmail::dispatch($details);
            }
        }
        // else{
        //     dd($sertifikat->email);
        //     $details['email'] = $sertifikat;
        //     SendEmail::dispatch($sertifikat);
        // }

        return redirect('/dashboard'.'/'.$date);
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
        $date = date("Y-m-d");

        if (DB::table('absen_karyawan')
            ->where('idkaryawan', '=', $request->idkaryawan)
            ->where('tanggal', '=', $date)->exists()){
            return redirect('/form'.'/'.$date);
        }
        else{

            DB::table('absen_karyawan')->insert(
                ['idkaryawan' => $request->idkaryawan,
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'notes' => $request->notes
                ]
            );
            return redirect('/dashboard'.'/'.$date);
        }
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


    public function form()
    {
        $karyawan = DB::table('karyawan')->get();
        return view('home.formTambah', ['karyawan' => $karyawan]);
    }

    public function karyawan(Request $request)
    {
        $search = $request->cari;
        $date = date("Y-m-d");

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
                $status = ' ';
            }
            else
            {
                $tanggalkadaluarsa = date('d F Y', strtotime($karyawan->tanggalkadaluarsa));
                $status = ' ';
            }

            if($karyawan->tanggalkadaluarsa < $date){
                $status = 'Tidak Aktif';
            }
            else
            {
                $status = 'Aktif';
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
               "status" => $status,
            );
        }
        return response()->json($response);
    }

    public function sertifill(Request $request)
    {
        $search = $request->cari;

        if($search == ' '){
            $karyawan = DB::table('karyawan')
                             ->select('*')
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

           $response[] = array(
               "value" => $karyawan->id,
               "label" => $karyawan->idkaryawan,
            );
        }
        return response()->json($response);
    }

    public function tambahsertifikat()
    {
        return view('sertifikasi.tambahSertifikat');
    }

    public function storesertif(Request $request)
    {
        $date = date("Y-m-d");

        if (DB::table('sertifikat')
            ->where('idkaryawan', '=', $request->idkaryawan)->exists()){
            return redirect('/dashboard'.'/'.$date);
        }
        else{

            DB::table('sertifikat')->insert(
                ['idkaryawan' => $request->idkaryawan,
                'namasertifikat' => $request->namasertifikat,
                'tanggaldibuat' => $request->tanggaldibuat,
                'tanggalkadaluarsa' => $request->tanggalkadaluarsa,
                ]
            );
            return redirect('/sertifikasi');
        }
    }


    public function question()
    {
        return view('home.question');
    }

    public function sertifikat()
    {

        $sertifikat = DB::table('sertifikat')
                            ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->select('karyawan.namadepan', 'karyawan.namabelakang', 'karyawan.idkaryawan', 'karyawan.divisi', 'sertifikat.*')
                            ->get();

        return view('sertifikasi.sertifikasi', ['sertifikat' => $sertifikat]);
    }

    public function notif()
    {

        $sertifikat = DB::table('sertifikat')
                            ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->select('karyawan.*', 'sertifikat.*')
                            ->get();

        return view('notifikasi', ['sertifikat' => $sertifikat]);
    }

    public function destroyAbsen($id)
    {

        $date = date("Y-m-d");

        DB::table('absen_karyawan')->where('id', '=', $id)->delete();

        return redirect('/dashboard'.'/'.$date);
    }

    public function destroySertifikat($id)
    {

        $date = date("Y-m-d");

        DB::table('sertifikat')->where('id', '=', $id)->delete();

        return redirect('/sertifikasi');
    }

}
