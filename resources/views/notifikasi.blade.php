@extends('layout/main')

@section('title','Notifikasi')

@section('customCss')
  <link href="{{ asset('css/notifikasi.css') }}" rel="stylesheet">
@endsection

@section('customJs')
  <script src="{{ asset('js/notifikasi.js') }}"></script>
@endsection

@section('sideMenu')
  <li class="nav-item border-left border-sidemenu">
    <a class="ml-4 nav-link" href="/dashboard/{{ date("Y-m-d") }}"><i class="fa fa-home fa-lg"></i><span class="ml-3">Dashboard</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/sertifikasi"><i class="fa fa-id-card-o "></i><span class="ml-3">Sertifikat</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/pekerja"><i class="fa fa-users"></i><span class="ml-3">Pekerja</span></a>
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
        <a class="ml-4 nav-link active" href="/notifikasi"><i class="fa fa-bell-o"></i><span class="ml-3">Notifikasi</span></a>
      </li>
      <li class="nav-item">
        <a class="ml-4 nav-link" href="/logout"><i class="fa fa-sign-out"></i><span class="ml-3">Logout</span></a>
      </li>
    </ul>
  </div>
@endsection

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
        <p class="h1">Notifikasi</p>
    </div>

    <div>
        @foreach($sertifikat as $sertifikat)
        <p class="pb-3 pt-3 m-0 border-bottom">Sertifikat Pekerja {{ $sertifikat->idkaryawan }} {{ $sertifikat->namadepan }} {{ $sertifikat->namabelakang }}
            @if ($sertifikat->tanggalkadaluarsa < date("Y-m-d")) sudah Tidak Aktif
            @else
            akan mengalami masa Tidak Aktif pada tanggal {{ date('d F Y', strtotime($sertifikat->tanggalkadaluarsa))}}
            @endif
        </p>

        @endforeach
    </div>

@endsection
