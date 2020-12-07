@extends('layout/main')

@section('title','Dashboard')

@section('customCss')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-validation.css') }}" rel="stylesheet">

@endsection

@section('customJs')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/form-validation.js') }}"></script>
@endsection

@section('sideMenu')
  <li class="nav-item border-left border-sidemenu">
    <a class="ml-4 nav-link active" href="/dashboard/{{ date("Y-m-d") }}"><i class="fa fa-home fa-lg"></i><span class="ml-3">Dashboard</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="#"><i class="fa fa-id-card-o "></i><span class="ml-3">Sertifikat</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="#"><i class="fa fa-users"></i><span class="ml-3">Pekerja</span></a>
  </li>

  <div style="position:fixed; bottom: 0; ">
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">John Doe</span></a>
      </li>
      <li class="nav-item">
        <a class="ml-4 nav-link" href="#"><i class="fa fa-bell-o"></i><span class="ml-3">Notifikasi</span></a>
      </li>
      <li class="nav-item">
        <a class="ml-4 nav-link" href="#"><i class="fa fa-sign-out"></i><span class="ml-3">Logout</span></a>
      </li>
    </ul>
  </div>
@endsection

@section('main')

    @foreach($absen as $absen)
    <div class=" justify-content-between align-items-center pt-3 mb-3">
      <p class="h1">Detail Pekerja</p>
      <p class="h5">{{ $absen->idkaryawan }} - {{ $absen->divisi }}</p>
      <p class="h5">{{ $absen->namadepan }} {{ $absen->namabelakang }}</p>
    </div>

    <form name="form" action="/dashboard/{{ date("Y-m-d")}}" method="get">
        @csrf
      <div class="form-group mt-10" >
        <label for="exampleFormControlInput1">ID Pekerja</label>
        <input type="text" class="form-control" name="idkaryawan"id="idkaryawan" value="{{ $absen->idkaryawan }}" placeholder="contoh : ID0001" readonly>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Divisi</label>
        <input type="text" class="form-control" id="divisi" value="{{ $absen->divisi }}" placeholder="" readonly>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nama Depan</label>
            <input type="text" class="form-control" id="nama"  value="{{ $absen->namadepan }}" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Nama Belakang</label>
            <input type="text" class="form-control" id="namabelakang" value="{{ $absen->namabelakang }}" readonly>
          </div>
      </div>
      <div class="form-group">
          <label for="exampleFormControlSelect1">Jenis Kelamin</label>
          <input type="text" class="form-control" id="jeniskelamin" value="{{ $absen->jeniskelamin }}" readonly>
      </div>

      <div class="form-group pt-1">
        <label for="exampleFormControlTextarea1">Alasan tidak bekerja</label>
        <textarea class="form-control" name ="notes" id="notes" rows="3" readonly>{{ $absen->notes }}</textarea>
      </div>

      <button type="submit" class="btn custom-yellow">Kembali</button>
    </form>
    @endforeach

@endsection
