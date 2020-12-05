@extends('layout/main')

@section('title','Sertifikasi')

@section('customCss')
  <link href="{{ asset('css/sertifikasi.css') }}" rel="stylesheet">
@endsection

@section('customJs')
  <script src="{{ asset('js/sertifikasi.js') }}"></script>
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

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
      <h1>Tambah Sertifikat</h1>
    </div>

    <form name="form" action="" method="post">
        @csrf
      <div class="form-group mt-10" >
        <label for="exampleFormControlInput1">ID Pekerja</label>
        <input type="text" class="form-control" name="idkaryawan" id="idkaryawan" placeholder="contoh : ID0001">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Nama Sertifikat</label>
        <input type="text" class="form-control" id="namaSertifikat" placeholder="Masukkan Jenis Sertifikat Keahlian">
      </div>

{{-- pilih tanggalnya mau pke datepicker apa input sendiri ? kalo pake datepicker agak ribet --}}
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="tanggalDibuat">Tanggal Dibuat</label>
            <input type="text" class="form-control" id="tglDibuat">
          </div>
          <div class="form-group col-md-6">
            <label for="tanggalKadaluarsa">Tanggal Kadaluarsa</label>
            <input type="text" class="form-control" id="tglKadaluarsa">
          </div>
      </div>
      <button type="submit" class="btn custom-yellow">Tambah Sertifikat</button>
    </form>
  </main>

@endsection
