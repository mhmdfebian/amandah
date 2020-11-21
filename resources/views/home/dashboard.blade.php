@extends('layout/main')

@section('title','Dashboard')

@section('customCss')
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

@endsection

@section('customJs')
  <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection


@section('mainSidebar')
  <li class="nav-item">
    <a class="nav-link active" href="/">
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
    <a class="nav-link " href="/">
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
      <h1 class="h2">Safety Check</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <h2>{{date("d F Y")}}</h2>
        </div>

      </div>
    </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
      <h2>Daftar Absen</h2>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <a href="/form" class="btn btn-primary" role="button" aria-pressed="true">Absen Pekerja</a>
        </div>

      </div>
    </div>

  <div class="pb-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
            <th>Nama</th>
            <th>ID</th>
            <th>Jenis Kelamin</th>
            <th>Divisi</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Edit</th>
          </tr>
      </thead>
      <tbody>
        @foreach($absen as $absen)
        <tr>
            <td>{{ $absen->namadepan }} {{ $absen->namabelakang }}</td>
            <td>{{ $absen->idkaryawan }}</td>
            <td>{{ $absen->jeniskelamin }}</td>
            <td>{{ $absen->divisi }}</td>
            @if ($absen->status === "Bekerja")
            <td style="color:green">{{ $absen->status }}</td>
            @else
            <td style="color:red">{{ $absen->status }}</td>
            @endif
            <td>{{ $absen->waktu }}</td>
            <td>Edit Delete</td>
        </tr>
        @endforeach
        </tbody>
      <tfoot>
          <tr>
            <th>Nama</th>
            <th>ID</th>
            <th>Jenis Kelamin</th>
            <th>Divisi</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Edit</th>
          </tr>
      </tfoot>
    </table>
  </div>



    {{-- <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Nama</th>
            <th>ID</th>
            <th>Jenis Kelamin</th>
            <th>Divisi</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach($absen as $absen)
            <tr>
                <td>{{ $absen->namadepan }} {{ $absen->namabelakang }}</td>
                <td>{{ $absen->idkaryawan }}</td>
                <td>{{ $absen->jeniskelamin }}</td>
                <td>{{ $absen->divisi }}</td>
                <td>{{ $absen->status }}</td>
                <td>{{ $absen->waktu }}</td>
                <td>Edit Delete</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div> --}}


  </main>

@endsection
