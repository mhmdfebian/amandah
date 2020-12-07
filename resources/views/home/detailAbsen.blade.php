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

@section('mainSidebar')
  <li class="nav-item">
    <a class="nav-link active" href="/dashboard/{{ date("Y-m-d")}}">
      <span data-feather="home"></span>
      Dashboard
      {{-- <span class="sr-only">(current)</span> --}}
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/sertifikasi">
      <span data-feather="file"></span>
      Sertifikasi
    </a>
  </li>
@endsection
@section('footerSidebar')
  <li class="nav-item">
    <a class="nav-link" href="/">
      <span data-feather="home"></span>
      Profile
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="/notifikasi">
      <span data-feather="file"></span>
      Notifikasi
    </a>
  </li>
  <li class="nav-item">
      <a class="nav-link " href="{{ route('logout') }}">
        <span data-feather="file"></span>
        Logout
      </a>
  </li>
@endsection

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    @foreach($absen as $absen)
    <div class=" justify-content-between align-items-center pt-3 pb-2 mb-3">
      <h1 class="h1">Detail Pekerja</h1>
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
  </main>

@endsection
