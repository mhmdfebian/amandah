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

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
      <h1>Daftar Pekerja</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <a href="/tambah-pekerja" class="btn custom-yellow" role="button" aria-pressed="true">Tambah Pekerja</a>
        </div>
      </div>
    </div>

    <div class="pb-4">
      <table id="example" class="table table-striped table-bordered yajra-datatable" style="width:100%">
        <thead>
            <tr>
              <th>Nama</th>
              <th>ID Pekerja</th>
              <th>Divisi</th>
              <th>TTL</th>
              <th>Jenis Kelamin</th>
              <th>Email</th>
              <th>No HP</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($sertifikat as $sertifikat)
            <tr>
                <td>{{ $sertifikat->namadepan }} {{ $sertifikat->namabelakang }}</td>
                <td>{{ $sertifikat->idkaryawan }}</td>
                <td>{{ $sertifikat->divisi }}</td>
                <td>{{ $sertifikat->namasertifikat }}</td>
                <td>{{ date('d F Y', strtotime($sertifikat->tanggalkadaluarsa))
                }}</td>
                @if ($sertifikat->tanggalkadaluarsa < date("Y-m-d"))
                <td style="color:red">Tidak Aktif</td>
                @else
                <td style="color:green">Aktif</td>
                @endif
                <td>Edit Delete</td>
            </tr>
            @endforeach --}}

          </tbody>
      </table>
    </div>
  </main>

@endsection
