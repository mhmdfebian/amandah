@extends('layout/main')

@section('title','Sertifikasi')

@section('customCss')
  <link href="{{ asset('css/pekerja.css') }}" rel="stylesheet">
@endsection

@section('customJs')
  <script src="{{ asset('js/pekerja.js') }}"></script>
@endsection

@section('mainSidebar')
<li class="nav-item">
  <a class="nav-link" href="/dashboard/{{ date("Y-m-d")}}">
    <span data-feather="home"></span>
    Dashboard
    {{-- <span class="sr-only">(current)</span> --}}
  </a>
</li>
<li class="nav-item">
  <a class="nav-link active" href="/sertifikasi">
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
      <a class="nav-link " href="/">
        <span data-feather="file"></span>
        Logout
      </a>
  </li>
@endsection

@section('main')
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pekerja</h1>
      </div>

      <form name="form" action="/pekerja" method="post">
          @csrf
        <div class="form-row mt-10">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nama Depan</label>
              <input type="text" class="form-control" name="namadepan" id="namadepan" >
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Nama Belakang</label>
              <input type="text" class="form-control" name="namabelakang" id="namabelakang" >
            </div>
        </div>
        <div class="form-group" >
          <label for="exampleFormControlInput1">ID Pekerja</label>
          <input type="text" class="form-control" name="idkaryawan" id="idkaryawan" placeholder="contoh : ID0001">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Divisi</label>
          <input type="text" class="form-control" name="divisi" id="divisi" placeholder="" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Tempat Tanggal Lahir</label>
            <input type="text" class="form-control" name="ttl" id="ttl" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
            <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Email</label>
            <input type="text" class="form-control" name="email" id="email" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">No Hand Phone</label>
            <input type="text" class="form-control" name="nohp" id="nohp" >
        </div>

        <button type="submit" class="btn custom-yellow mb-3">Tambah Pekerja</button>
      </form>
  </main>

@endsection
