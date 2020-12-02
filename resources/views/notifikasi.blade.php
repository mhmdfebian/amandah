@extends('layout/main')

@section('title','Notifikasi')

@section('customCss')
  <link href="{{ asset('css/notifikasi.css') }}" rel="stylesheet">
@endsection

@section('customJs')
  <script src="{{ asset('js/notifikasi.js') }}"></script>
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
    <a class="nav-link active" href="/notifikasi">
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
        <h1>Notifikasi</h1>
    </div>

    <div>
        <p class="pb-3 pt-3 m-0 border-bottom">Sertifikat Pekerja DIV001 Muhammad Febian Ferdiansyah sudah Tidak Aktif</p>
        <p class="pb-3 pt-3 m-0 border-bottom">Sertifikat Pekerja MIN001 I Made Dharma Eka Putra sudah Tidak Akftif</p>
        <p class="pb-3 pt-3 m-0 border-bottom">Sertifikat Pekerja MIN002 Faiq Syahbani Sulisno akan mengalami masa Tidak Aktif pada tanggal 20-10-2020</p>
    </div>
</main>

@endsection