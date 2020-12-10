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
        if(session('login')){
            return redirect('/sendEmail');
        }else{
            return view('login');
        }
    }

    public function masuk(Request $request)
    {

            $data = DB::table('users')
                            ->where('email', '=', $request->inputEmail)
                            ->select('email','password','role')
                            ->get();

            $email = 'NULL';
            $password = 'NULL';
            $role = 'NULL';
            $emailverif = $request->inputEmail;

            foreach($data as $data){
                $email = $data->email;
                $password = $data->password;
                $role = $data->role;
            };

            if($emailverif == $email)
            {
                $hash = $request->inputPassword;

                    if(Hash::check($hash, $password))
                    {
                        $date = date("Y-m-d");
                        session(['login' => true]);
                        if($role == '0'){
                            session(['admin' => true]);
                        }
                        else{
                            session(['admin' => false]);
                        }
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

    //Dashboard
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
                            ->select('karyawan.namadepan', 'karyawan.namabelakang', 'karyawan.idkaryawan', 'karyawan.jeniskelamin',
                                        'karyawan.divisi', 'absen_karyawan.waktu', 'absen_karyawan.status', 'absen_karyawan.id','absen_karyawan.id')
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

        $countbekerja0 = DB::table('absen_karyawan')
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

        if(session('login')){
            return view('home.dashboard', [ 'absen' => $absen,
                                            'persen' => $persen,
                                            'countkaryawan' => $countkaryawan,
                                            'countbekerja' => $countbekerja,
                                            'countbekerja0' => $countbekerja0,
                                            'countbekerja1' => $countbekerja1,
                                            'countbekerja2' => $countbekerja2,
                                            'countbekerja3' => $countbekerja3,
                                            'countbekerja4' => $countbekerja4,
                                            'tanggal' => $date
                                           ]);
        }else{
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $date = date("Y-m-d");

        if (DB::table('absen_karyawan')
            ->where('idkaryawan', '=', $request->idkaryawan)
            ->where('tanggal', '=', $date)->exists()){
            return redirect('/dashboard'.'/'.$date)->with('gagal', 'Absen pekerja '. $request->idkaryawan .' tidak berhasil ditambahkan');
        }
        else{

            if($request->notes == NULL)
            {
                $notes = ' ';
            }else{
                $notes = $request->notes;
            }

            DB::table('absen_karyawan')->insert(
                ['idkaryawan' => $request->idkaryawan,
                'status' => $request->status,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'notes' => $notes
                ]
            );
            if(session('login')){
                return redirect('/dashboard'.'/'.$date)->with('berhasil', 'Absen pekerja '. $request->idkaryawan .' berhasil ditambahkan');
            }else{
                return redirect('/');
            }
        }
    }

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

    public function question()
    {
        if(session('login')){
            return view('home.question');
        }else{
            return redirect('/');
        }
    }

    public function destroyAbsen($id)
    {

        $date = date("Y-m-d");

        $absen = DB::table('absen_karyawan')
        ->join('karyawan', 'absen_karyawan.idkaryawan', '=', 'karyawan.idkaryawan')
        ->where('absen_karyawan.id', '=', $id)
        ->select('karyawan.idkaryawan')
        ->get();

        DB::table('absen_karyawan')->where('id', '=', $id)->delete();


        foreach ($absen as $absen) {
           $idkaryawan = $absen->idkaryawan;
        }

        if(session('login')){
            return redirect('/dashboard'.'/'.$date)->with('berhasil', 'Absen pekerja ' .$idkaryawan. ' berhasil dihapus');
        }else{
            return redirect('/');
        }

    }

    public function showAbsen($id){

        $absen = DB::table('absen_karyawan')
        ->join('karyawan', 'absen_karyawan.idkaryawan', '=', 'karyawan.idkaryawan')
        ->where('absen_karyawan.id', '=', $id)
        ->select('karyawan.namadepan', 'karyawan.namabelakang', 'karyawan.idkaryawan', 'karyawan.jeniskelamin', 'karyawan.divisi',
                 'absen_karyawan.waktu', 'absen_karyawan.notes', 'absen_karyawan.id','absen_karyawan.id')
        ->get();

        if(session('login')){
            return view('home.detailAbsen', [ 'absen' => $absen ]);
        }else{
            return redirect('/');
        }

    }

    //Email
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
                SendEmail::dispatch($details);
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
                SendEmail::dispatch($details);
            }
        }

        if(session('login')){
            return redirect('/dashboard'.'/'.$date);
        }else{
            return redirect('/');
        }
    }


    //Sertifikat
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
        if(session('login')){
            return view('sertifikasi.tambahSertifikat');
        }else{
            return redirect('/');
        }
    }

    public function storesertif(Request $request)
    {
        $date = date("Y-m-d");

        if (DB::table('sertifikat')
            ->where('idkaryawan', '=', $request->idkaryawan)->exists()){
            return redirect('/sertifikasi')->with('gagal', $request->namasertifikat.' tidak berhasil ditambahkan');
        }
        else{

            DB::table('sertifikat')->insert(
                ['idkaryawan' => $request->idkaryawan,
                'namasertifikat' => $request->namasertifikat,
                'tanggaldibuat' => $request->tanggaldibuat,
                'tanggalkadaluarsa' => $request->tanggalkadaluarsa,
                ]
            );

            if(session('login')){
                return redirect('/sertifikasi')->with('berhasil',
                $request->namasertifikat.' berhasil ditambahkan');
            }else{
                return redirect('/');
            }
        }
    }

    public function sertifikat()
    {

        $sertifikat = DB::table('sertifikat')
                            ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->select('karyawan.namadepan', 'karyawan.namabelakang', 'karyawan.idkaryawan', 'karyawan.divisi', 'sertifikat.*')
                            ->get();

        if(session('login')){
            return view('sertifikasi.sertifikasi', ['sertifikat' => $sertifikat]);
        }else{
            return redirect('/');
        }
    }

    public function destroySertifikat($id)
    {

        $date = date("Y-m-d");

        $sertifikat = DB::table('sertifikat')
        ->where('id', '=', $id)
        ->select('namasertifikat')
        ->get();

        DB::table('sertifikat')->where('id', '=', $id)->delete();

        foreach ($sertifikat as $sertifikat) {
            $sertifikatnama = $sertifikat->namasertifikat;
         }

        if(session('login')){
            return redirect('/sertifikasi')->with('berhasil', $sertifikatnama. ' berhasil dihapus');
        }else{
            return redirect('/');
        }
    }

    public function editSertifikat($id){

        $sertifikat = DB::table('sertifikat')
        ->where('id', '=', $id)
        ->select('*')
        ->get();

        if(session('login')){
            return view('sertifikasi.editSertifikat', [ 'sertifikat' => $sertifikat]);
        }else{
            return redirect('/');
        }
    }

    public function updateSertifikat(Request $request, $id)
    {
        $sertifikat = DB::table('sertifikat')
        ->where('id', '=', $id)
        ->select('*')
        ->get();

        foreach ($sertifikat as $sertifikat) {
            $sertifikatnama = $sertifikat->namasertifikat;
         }

        DB::table('sertifikat')
        ->where('id', '=', $id)
        ->update([
            'idkaryawan' => $request->idkaryawan,
            'namasertifikat'=> $request->namasertifikat,
            'tanggaldibuat' => $request->tanggaldibuat,
            'tanggalkadaluarsa' => $request->tanggalkadaluarsa
        ]);

        if(session('login')){
            return redirect('/sertifikasi')->with('berhasil', $sertifikatnama. ' berhasil diubah');;
        }else{
            return redirect('/');
        }
    }

    //Notifikasi
    public function notif()
    {

        $sertifikat = DB::table('sertifikat')
                            ->join('karyawan', 'sertifikat.idkaryawan', '=', 'karyawan.idkaryawan')
                            ->select('karyawan.*', 'sertifikat.*')
                            ->get();

        if(session('login')){
            return view('notifikasi', ['sertifikat' => $sertifikat]);
        }else{
            return redirect('/');
        }
    }

    //Pekerja
    public function pekerja()
    {
        $pekerja = DB::table('karyawan')
                            ->select('*')
                            ->get();

        if(session('login')){
            return view('pekerja.daftarPekerja', ['pekerja' => $pekerja]);
        }else{
            return redirect('/');
        }
    }

    public function tambahPekerja()
    {
        return view('pekerja.tambahPekerja');
    }

    public function storePekerja(Request $request)
    {
        $date = date("Y-m-d");

        if (DB::table('karyawan')
            ->where('idkaryawan', '=', $request->idkaryawan)->exists()){
            return redirect('/pekerja')->with('gagal', $request->idkaryawan.' tidak berhasil ditambahkan');
        }
        else{

            DB::table('karyawan')->insert(
                ['idkaryawan' => $request->idkaryawan,
                'namadepan' => $request->namadepan,
                'namabelakang' => $request->namabelakang,
                'divisi' => $request->divisi,
                'ttl' => $request->ttl,
                'jeniskelamin' => $request->jeniskelamin,
                'email' => $request->email,
                'nohp' => $request->nohp
                ]
            );

            if(session('login')){
                return redirect('/pekerja')->with('berhasil', $request->idkaryawan.' berhasil ditambahkan');
            }else{
                return redirect('/');
            }
        }
    }

    public function destroyPekerja($id)
    {
        $pekerja = DB::table('karyawan')
        ->where('id', '=', $id)
        ->select('idkaryawan')
        ->get();

        DB::table('karyawan')->where('id', '=', $id)->delete();

        foreach ($pekerja as $pekerja) {
            $idkaryawan = $pekerja->idkaryawan;
        }

        DB::table('sertifikat')->where('idkaryawan', '=', $idkaryawan)->delete();
        DB::table('absen_karyawan')->where('idkaryawan', '=', $idkaryawan)->delete();

        if(session('login')){
            return redirect('/pekerja')->with('berhasil', $idkaryawan. ' berhasil dihapus');
        }else{
            return redirect('/');
        }
    }


    public function editPekerja($id){

        $karyawan = DB::table('karyawan')
        ->where('id', '=', $id)
        ->select('*')
        ->get();

        if(session('login')){
            return view('pekerja.editPekerja', [ 'karyawan' => $karyawan]);
        }else{
            return redirect('/');
        }
    }

    public function updatePekerja(Request $request, $id)
    {
        $karyawan = DB::table('karyawan')
        ->where('id', '=', $id)
        ->select('*')
        ->get();

        foreach ($karyawan as $karyawan) {
            $idkaryawan = $karyawan->idkaryawan;
         }

        $projects_updated = DB::table('karyawan')
                            ->where('id', '=', $id)
                            ->update([
                                    'idkaryawan' => $request->idkaryawan,
                                    'namadepan' => $request->namadepan,
                                    'namabelakang' => $request->namabelakang,
                                    'divisi' => $request->divisi,
                                    'ttl' => $request->ttl,
                                    'jeniskelamin' => $request->jeniskelamin,
                                    'email' => $request->email,
                                    'nohp' => $request->nohp
        ]);


        if(session('login')){
            return redirect('/pekerja')->with('berhasil', $idkaryawan. 'berhasil diubah');
        }else{
                return redirect('/');
        }

    }


}
