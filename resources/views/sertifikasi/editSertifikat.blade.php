@extends('layout/main')

@section('title','Sertifikasi')

@section('customCss')
  <link href="{{ asset('css/sertifikasi.css') }}" rel="stylesheet">
@endsection

@section('customJs')
  <script src="{{ asset('js/sertifikasi.js') }}"></script>
@endsection

@section('sideMenu')
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/dashboard/{{ date("Y-m-d") }}"><i class="fa fa-home fa-lg"></i><span class="ml-3">Dashboard</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu">
    <a class="ml-4 nav-link active" href="/sertifikasi"><i class="fa fa-id-card-o "></i><span class="ml-3">Sertifikat</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/pekerja"><i class="fa fa-users"></i><span class="ml-3">Pekerja</span></a>
  </li>

  <div style="position:fixed; bottom: 0; ">
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">John Doe</span></a>
      </li>
      <li class="nav-item">
        <a class="ml-4 nav-link" href="/notifikasi"><i class="fa fa-bell-o"></i><span class="ml-3">Notifikasi</span></a>
      </li>
      <li class="nav-item">
        <a class="ml-4 nav-link" href="/logout"><i class="fa fa-sign-out"></i><span class="ml-3">Logout</span></a>
      </li>
    </ul>
  </div>
@endsection

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
      <p class="h1">Ubah Sertifikat</p>
    </div>
    @foreach($sertifikat as $sertifikat)
    <form name="form" action="{{ action('HomeController@updateSertifikat', $sertifikat->id)}}" method="post">
        @method('patch')
        @csrf
      <div class="form-group mt-10" >
        <label for="exampleFormControlInput1">ID Pekerja</label>
        <input type="text" class="form-control" name="idkaryawan" id="idkaryawan" value="{{ $sertifikat->idkaryawan }}" placeholder="contoh : ID0001" readonly>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Nama Sertifikat</label>
        <input type="text" class="form-control" name="namasertifikat" id="namasertifikat" value="{{ $sertifikat->namasertifikat }}" placeholder="Masukkan Jenis Sertifikat Keahlian">
      </div>

{{-- pilih tanggalnya mau pke datepicker apa input sendiri ? kalo pake datepicker agak ribet --}}
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="tanggalDibuat">Tanggal Dibuat</label>
            <input type="date" class="form-control" name="tanggaldibuat" value="{{ $sertifikat->tanggaldibuat }}" id="tanggaldibuat">
          </div>
          <div class="form-group col-md-6">
            <label for="tanggalKadaluarsa">Tanggal Kadaluarsa</label>
            <input type="date" class="form-control" name="tanggalkadaluarsa" value="{{ $sertifikat->tanggalkadaluarsa }}" id="tanggalkadaluarsa">
          </div>
      </div>
      @endforeach
      <button type="submit" class="btn custom-yellow">Ubah Sertifikat</button>
    </form>

@endsection

