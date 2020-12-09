@extends('layout/main')

@section('title','Daftar Pekerja')

@section('customCss')
  <link href="{{ asset('css/pekerja.css') }}" rel="stylesheet">
@endsection

@section('customJs')
  <script src="{{ asset('js/pekerja.js') }}"></script>
@endsection

@section('sideMenu')
<li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/dashboard/{{ date("Y-m-d") }}"><i class="fa fa-home fa-lg"></i><span class="ml-3">Dashboard</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link " href="/sertifikasi"><i class="fa fa-id-card-o "></i><span class="ml-3">Sertifikat</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu">
    <a class="ml-4 nav-link active" href="/pekerja"><i class="fa fa-users"></i><span class="ml-3">Pekerja</span></a>
  </li>

  <div style="position:fixed; bottom: 0; ">
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        @if(session('admin'))
        <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">Admin</span></a>
        @endif
        @if(session('observer'))
            <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">Observer</span></a>
        @endif
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
        <p class="h2">Tambah Pekerja</p>
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

@endsection
