@extends('layout/main')

@section('title','Dashboard')

@section('customCss')
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('customJs')
  <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

@section('main')
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    <a href="/form" class="btn btn-primary" role="button" aria-pressed="true">Tambah Pekerja</a>

    <h2>Absen Karyawan - {{date("d F Y")}}</h2>
    <div class="table-responsive">
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
                <td>{{ $absen->nama }}</td>
                <td>{{ $absen->idkaryawan }}</td>
                <td>{{ $absen->jeniskelamin }}</td>
                <td>{{ $absen->divisi }}</td>
                <td>Bekerja</td>
                <td>{{ $absen->waktu }}</td>
                <td>Edit Delete</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </main>

@endsection
